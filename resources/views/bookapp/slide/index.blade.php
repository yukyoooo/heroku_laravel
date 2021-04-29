@extends('layouts.app')

@section('content')
トップページ
<div class="container">
    <div class="row justify-content-center">

        @foreach($slides as $slide)
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        <tr>
                            bookimg: <img src="{{ $slide->image_path }}"width="60">
                            title: <td> {{ $slide->book_title }}</td><br>
                            details: <td>{{ $slide->book_detail }}</td><br>
                            created_at: <td>{{ $slide->created_at }}</td><br>
                            author: <td>{{ $slide->user->name }}</td><br>
                            <td><a href="{{ route('bookapp.slide.show', ['id' => $slide->id ]) }}">詳細</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
        {{  $slides->links() }}
    </div>
</div>
@endsection
