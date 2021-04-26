@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    スライド詳細ページ<br>


                    @csrf
                    title: {{ $slide->book_title }}<br>
                    detail: {{ $slide->book_detail }}<br>
                    user: {{ $slide->user->name }}<br>
                    created_at: {{ $slide->created_at }}<br>
                        @auth
                            @if( ( $slide->user->id ) === ( Auth::user()->id ) )
                                <td><a class="btn btn-primary" href="{{ route('bookapp.slide.edit', ['id' => $slide->id ]) }}">編集</a></td>
                                <form method="POST" action="{{ route('bookapp.slide.destroy', ['id' => $slide->id ]) }}" id="delete_{{ $slide->id }}">
                                @csrf
                                    <a href="#" class="btn btn-danger" data-id="{{ $slide->id }}" onclick="deletePost(this);">削除する</a>
                                </form>
                            @endif
                        @endauth
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function deletePost(e){
    'use strict';
    if (confirm('本当に削除していいですか？')){
        document.getElementById('delete_' + e.dataset.id).submit()
    }
}
</script>
@endsection
