@extends('bookapp.layout')

@section('content')


<div class="top-image" style="margin-top:-63px;">
    <h1 class="top-title">Out Book</h1>
    <p>let's output a book ! out book!</p>
</div>
<div class="container">
    <div class="row justify-content-evenly">
        @include('bookapp._slides')

    </div>
    {{  $slides->links() }}
</div>

　Todo:<br>
　　[処理中]パワポをPDFに変換する処理<br>
　　[未着手]詳細のPDFをスライド形式にする<br>
　　[未着手]文字の大きさ、全体的なデザイン<br>
　　[未着手]いいねをjsで実装する(画面更新してほしくない)<br>
　　[未着手]クラウドフロントを導入して画像を早く表示させる<br>
　　[未着手]新しい投稿やコメントがあった際にTeams通知<br>
　　[未着手]ソースをキレイに整理する<br>



@endsection
