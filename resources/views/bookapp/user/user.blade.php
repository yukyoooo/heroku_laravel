@extends('bookapp.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    メンバー一覧です




                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="co1">名前</th>
                        <th scope="co2">紹介文</th>
                        <th scope="co3">一番好きな本</th>
                        <th scope="co4">次に好きな本</th>
                        <th scope="co5">お気に入りの本</th>
                        <th scope="co6">詳細</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->introduction }}</td>
                            <td>{{ $user->favorite_book }}</td>
                            <td>{{ $user->favorite_book2 }}</td>
                            <td>{{ $user->favorite_book3 }}</td>
                            <td>
                                <form method="GET" action="{{ route('bookapp.user.show', ['id' => $user->id ]) }}">
                                @csrf
                                    <input class="btn btn-info" type="submit" value="詳細を見る">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
