<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\bookApp;
use App\Repositories\Contracts\LikeRepository;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

/**
 * Class LikeController
 * @package App\Http\Controllers
 */
class LikeController extends Controller
{
    /**
     * @var \App\Repositories\Contracts\LikeRepository
     */
    private $likes;

    public function __construct(LikeRepository $likes)
    {
        $this->likes = $likes;
    }

    public function like(Request $request)
    {
        $ip = $request->ip(); //1.いいねをしたipアドレスを取得
        $slide_id = $request->slide_id; //2.投稿idの取得
        $already_liked = Like::where('book_app_id',$slide_id)->where('ip',$ip)->first();
        if (!$already_liked) { //もしこのユーザーがこの投稿にまだいいねしてなかったら
            $like = new Like; //4.Likeクラスのインスタンスを作成
            $like->book_app_id = $slide_id; //Likeインスタンスにreview_id,user_idをセット
            $like->ip = $ip;
            $like->save();
        } else { //もしこのユーザーがこの投稿に既にいいねしてたらdelete
            Like::where('book_app_id', $slide_id)
            ->where('ip', $ip)
            ->delete();
        }
        //5.この投稿の最新の総いいね数を取得
        $slide_likes_count = bookApp::withCount('likes')->findOrFail($slide_id)->likes_count;

        $param = [
            'slide_likes_count' => $slide_likes_count,
        ];
        return response()->json($param); //6.JSONデータをjQueryに返す
    }
}
