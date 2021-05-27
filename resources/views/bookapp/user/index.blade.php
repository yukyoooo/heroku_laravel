@extends('bookapp.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Page</div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('bookapp.user.edit', ['id' => $user->id ]) }}">
                        @csrf
                            <fieldset disabled>
                                <div class="mb-3">
                                    <label class="form-label">名前</label>
                                    <input type="text" class="form-control" placeholder="{{ $user->name }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">メールアドレス</label>
                                    <input type="email" class="form-control" placeholder=" {{ $user->email }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">ニックネーム</label>
                                    <input type="text" class="form-control" placeholder=" {{ $user->nickname }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">紹介文</label>
                                    <textarea type="text" class="form-control" placeholder="  {{ $user->introduction }}"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">一番好きな本</label>
                                    <input type="text" class="form-control" placeholder=" {{ $user->favorite_book }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">次に好きな本</label>
                                    <input type="text" class="form-control" placeholder=" {{ $user->favorite_book2 }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">お気に入りの本</label>
                                    <input type="text" class="form-control" placeholder=" {{ $user->favorite_book3 }}">
                                </div>
                            </fieldset>
                            <input class="float-right btn btn-primary" type="submit" value="変更する">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
