@extends('bookapp.layout')

@section('content')
　Todo:<br>
　　[処理中]PPTをスライド形式に表示し、上にあるバーを非表示にする<br>
　　[未着手]文字の大きさ調整<br>
　　[未着手]全体的なデザイン<br>
　　[未着手]いいねをjsで実装する(画面更新してほしくない)<br>
　　[未着手]クラウドフロントを導入して画像を早く表示させる<br>
　　[未着手]新しい投稿があった際にTeams通知<br>
　　[未着手]コメントが書かれた際にTeams通知<br>
　　[未着手]バグ：タイトルや文章修正してアップロードすると画像なしで登録される<br>
　　[未着手]パワポを画像に変換する処理<br>
　　[未着手]パワポアップロード追加<br>



<div class="container">
    <div class="row justify-content-evenly">
        @include('bookapp._slides')

    </div>
    {{  $slides->links() }}
</div>




@endsection
