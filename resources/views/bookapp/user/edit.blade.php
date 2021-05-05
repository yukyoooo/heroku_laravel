@extends('bookapp.layout')
@section('content')
　Todo:<br>
　　[　]全体的なデザイン<br>
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

                    マイページを編集します。




                            <form method="POST" action="{{ route('bookapp.user.update', [ $user->id ])}}">
                    @csrf
                        氏名
                        <input type="text" name="name" value="{{ $user->name }}">
                        <br>
                        <br>
                        メールアドレス
                        <input type="email" name="email" value="{{ $user->email }}">
                        <br>
                        <br>
                        紹介文
                        <textarea name="introduction" >{{ $user->introduction }}</textarea>
                        <br>

                        一番好きな本
                        <input type="text" name="favorite_book" value="{{ $user->favorite_book }}">
                        <br>
                        つぎに好きな本
                        <input type="text" name="favorite_book2" value="{{ $user->favorite_book2 }}">
                        <br>
                        お気に入りの本
                        <input type="text" name="favorite_book3" value="{{ $user->favorite_book3 }}">
                        <br>



                        <input class="btn btn-info" type="submit" value="変更する">
                    </form>





                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
