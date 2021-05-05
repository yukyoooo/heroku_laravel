@extends('bookapp.layout')

@section('content')
　Todo:<br>
　　[　]文字の大きさ調整<br>
　　[　]画像のスライド表示<br>
　　[　]文字の表示数調整<br>
　　[　]全体的なデザイン<br>
　　[　]コメント数を表示<br>

<div class="container">
    <div class="row justify-content-evenly">
        @include('bookapp._slides')

    </div>
    {{  $slides->links() }}
</div>




@endsection
