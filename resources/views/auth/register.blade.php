@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('名前') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス(loginID)') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="introduction" class="col-md-4 col-form-label text-md-right">{{ __('自己紹介文') }}</label>
                            <div class="col-md-6">
                                <textarea id="introduction" type="introduction" class="form-control @error('introduction') is-invalid @enderror" name="introduction" value="{{ old('introduction') }}" required autocomplete="introduction">
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="favorite_book" class="col-md-4 col-form-label text-md-right">{{ __('一番好きな本') }}</label>
                            <div class="col-md-6">
                                <input id="favorite_book" type="favorite_book" class="form-control @error('favorite_book') is-invalid @enderror" name="favorite_book" value="{{ old('favorite_book') }}" required autocomplete="favorite_book">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="favorite_book2" class="col-md-4 col-form-label text-md-right">{{ __('2番目に好きな本') }}</label>
                            <div class="col-md-6">
                                <input id="favorite_book2" type="favorite_book2" class="form-control @error('favorite_book2') is-invalid @enderror" name="favorite_book2" value="{{ old('favorite_book2') }}" required autocomplete="favorite_book2">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="favorite_book3" class="col-md-4 col-form-label text-md-right">{{ __('お気に入りの本') }}</label>
                            <div class="col-md-6">
                                <input id="favorite_book3" type="favorite_book3" class="form-control @error('favorite_book3') is-invalid @enderror" name="favorite_book3" value="{{ old('favorite_book3') }}" required autocomplete="favorite_book3">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('パスワード(確認)') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('登録') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
