/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require('./components/App');

$(function () {
let like = $('.like-toggle'); //like-toggleのついたiタグを取得し代入。
let likeSlideId; //変数を宣言（なんでここで？）
like.on('click', function () { //onはイベントハンドラー
    let $this = $(this); //this=イベントの発火した要素＝iタグを代入
    likeSlideId = $this.data('slide-id'); //iタグに仕込んだdata-review-idの値を取得
    console.log(likeSlideId);

    //ajax処理スタート
    $.ajax({
    headers: { //HTTPヘッダ情報をヘッダ名と値のマップで記述
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    },  //↑name属性がcsrf-tokenのmetaタグのcontent属性の値を取得
    url: '/like', //通信先アドレスで、このURLをあとでルートで設定します
    method: 'POST', //HTTPメソッドの種別を指定します。1.9.0以前の場合はtype:を使用。
    data: { //サーバーに送信するデータ
        'slide_id': likeSlideId //いいねされた投稿のidを送る
    },
    })
    //通信成功した時の処理
    .done(function (data) {
    $this.toggleClass('liked'); //likedクラスのON/OFF切り替え。
    $this.next('.like-counter').html(data.slide_likes_count);
    })
    //通信失敗した時の処理
    .fail(function () {
    console.log('fail');
    });
});
});
