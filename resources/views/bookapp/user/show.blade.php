@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    メンバー詳細です




                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="co1">名前</th>
                        <th scope="co3">紹介文</th>
                        <th scope="co4">一番好きな本</th>
                        <th scope="co5">次に好きな本</th>
                        <th scope="co6">お気に入りの本</th>

                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>{{ $member->name }}</td>
                            <td>{{ $member->introduction }}</td>
                            <td>{{ $member->favorite_book }}</td>
                            <td>{{ $member->favorite_book2 }}</td>
                            <td>{{ $member->favorite_book3 }}</td>

                        </tr>

                    </tbody>

                    <form method="GET" action="{{ route('bookapp.user.user') }}">
                    @csrf
                        <input class="btn btn-info" type="submit" value="一覧へ戻る">
                    </form>


                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
ユーザ毎のスライド一覧
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
                            <td><a href="{{ route('bookapp.slide.show', ['id' => $slide->id ]) }}">詳細</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
