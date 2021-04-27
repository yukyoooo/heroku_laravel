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
                    <form class="mb-4" method="POST" action="{{ route('comment.store') }}">
                        @csrf

                        <input
                            name="post_id"
                            type="hidden"
                            value="{{ $slide->id }}"
                        >

                        <div class="form-group">
                            <label for="subject">
                            名前
                            </label>
                            {{ $login_user->name }}
                        </div>

                        <div class="form-group">
                        <label for="body">
                        本文
                        </label>

                            <textarea
                                id="comment"
                                name="comment"
                                class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}"
                                rows="4"
                            >{{ old('comment') }}</textarea>
                            @if ($errors->has('comment'))
                            <div class="invalid-feedback">
                            {{ $errors->first('comment') }}
                            </div>
                            @endif
                        </div>

                        <div class="mt-4">
                        <button type="submit" class="btn btn-primary">
                        コメントする
                        </button>
                        </div>
                    </form>

                    @if (session('commentstatus'))
                        <div class="alert alert-success mt-4 mb-4">
                        {{ session('commentstatus') }}
                        </div>
                    @endif

                    <section>
                        <h2 class="h5 mb-4">
                            コメント
                        </h2>

                        @forelse($slide->comments as $comment)
                            <div class="border-top p-4">
                                <time class="text-secondary">
                                    {{ $comment->name }} /
                                    {{ $comment->created_at->format('Y.m.d H:i') }} /
                                </time>
                                <p class="mt-2">
                                    {!! nl2br(e($comment->comment)) !!}
                                </p>
                            </div>
                        @empty
                            <p>コメントはまだありません。</p>
                        @endforelse
                    </section>
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
