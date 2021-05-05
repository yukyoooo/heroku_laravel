@extends('bookapp.layout')

@section('content')
　Todo:<br>
　　[　]文字の大きさ調整<br>
　　[　]画像のスライド表示<br>
　　[　]全体的なデザイン<br>
　　[　]バグ：ナビバーのドロップダウンが反応しない<br>

<div class="container">
    <div class="row justify-content-evenly">
        @include('bookapp._slides')

    </div>
    {{  $slides->links() }}
</div>




@endsection
