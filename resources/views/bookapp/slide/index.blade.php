@extends('bookapp.layout')

@section('content')
　Todo:<br>
　　[処理中]PPTをスライド形式に表示し、上にあるバーを非表示にする
　　[未着手]文字の大きさ調整<br>
　　[未着手]全体的なデザイン<br>
　　[未着手]バグ：ナビバーのドロップダウンが反応しない<br>
　　[未着手]いいねをjsで実装する(画面更新してほしくない)<br>
　　[未着手]クラウドフロントを導入して画像を早く表示させる<br>

<div class="container">
    <div class="row justify-content-evenly">
        @include('bookapp._slides')

    </div>
    {{  $slides->links() }}
</div>




@endsection
