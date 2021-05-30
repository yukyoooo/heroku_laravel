@extends('bookapp.layout')

@section('content')


<div class="container " style="margin-top:100px;">
    <div class="row">
        <h1>今後実装しようとしていること一覧</h1>
        <ul class="list-group list-group-flush" style="margin-top:50px;">
            <li class="list-group-item">パワポをPDFに変換する処理</li>
            <li class="list-group-item">スマホ対応</li>
            <li class="list-group-item">詳細ページのPDFをスライド形式にする</li>
            <li class="list-group-item">文字の大きさ、全体的なデザイン</li>
            <li class="list-group-item">クラウドフロントを導入して画像を早く表示させる</li>
            <li class="list-group-item">書籍登録する際に書籍検索APIを使って書籍情報自動登録 参考：https://qiita.com/kanary/items/5ec45bbc01efd4388fdb</li>
            <li class="list-group-item">タグ検索、カテゴリ一覧表示</li>
            <li class="list-group-item">ソースをキレイに整理する</li>
            <rabel style="margin-top:30px;">達成済み</rabel>
            <li class="list-group-item disabled" aria-disabled="true"><s>タグ追加</s></li>
            <li class="list-group-item disabled" aria-disabled="true"><s>書籍登録時、何を学んだかを書く項目追加</s></li>
            <li class="list-group-item disabled" aria-disabled="true"><s>pdfの登録バリデーション</s></li>
            <li class="list-group-item disabled" aria-disabled="true"><s>見える部分はニックネーム表記</s></li>
            <li class="list-group-item disabled" aria-disabled="true"><s>ドメイン+SSL</s></li>
            <li class="list-group-item disabled" aria-disabled="true"><s>新しい投稿やコメントがあった際にTeams通知</s></li>
            <li class="list-group-item disabled" aria-disabled="true"><s>いいねをjsで実装する(画面更新してほしくない)</s></li>
        </ul>
    </div>
</div>
