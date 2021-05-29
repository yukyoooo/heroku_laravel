<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Teams;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;


class CommentsController extends Controller
{

    public function store(CommentRequest $request)
    {
        $savedata = [
            'book_app_id' => $request->post_id,
            'name' => Auth::user()->nickname ? Auth::user()->nickname : Auth::user()->name,
            'comment' => $request->comment,
        ];
        $comment = new Comment;
        $comment->fill($savedata)->save();

        #teams通知
        $postLink="https://outbook.work/show/".$request->post_id;
        $messageTeams = "コメントが投稿されたよ -> <a href=".$postLink.">コメントされた投稿へ</a>";
        $webhookUrl = config('teams.outbook');
        Teams::notice('新コメント!!', $messageTeams, $webhookUrl);
        return redirect()->route('bookapp.slide.show', [$savedata['book_app_id']])->with('commentstatus','コメントを投稿しました');
    }
}
