@extends('bookapp.layout')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Fix My Page</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('bookapp.user.update', [ $user->id ])}}">
                    @csrf

                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">氏名</label>
                            <input type="text" name="name" class="form-control"  value="{{ $user->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">メールアドレス</label>
                            <input type="email" name="email" class="form-control"  value="{{ $user->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">紹介文</label>
                            <textarea  class="form-control" name="introduction" >{{ $user->introduction }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">一番好きな本</label>
                            <input type="text" name="favorite_book" class="form-control"  value="{{ $user->favorite_book }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">つぎに好きな本</label>
                            <input type="text" name="favorite_book2" class="form-control"  value="{{ $user->favorite_book2 }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">お気に入りの本</label>
                            <input type="text" name="favorite_book3" class="form-control"  value="{{ $user->favorite_book3 }}">
                        </div>
                        <div class="mt-3 float-right">
                            <a type="button" class="btn btn-secondary" data-bs-dismiss="modal" href="{{ route('bookapp.slide.index') }}">Cancel</a>
                            <input class="btn btn-primary" type="submit" value="変更する">
                        </div>
                    </form>





                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
