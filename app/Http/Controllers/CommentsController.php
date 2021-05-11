<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Support\Facades\Auth;


class CommentsController extends Controller
{

    public function store(CommentRequest $request)
    {
        $savedata = [
            'book_app_id' => $request->post_id,
            'name' => Auth::user()->name,
            'comment' => $request->comment,
        ];
        $comment = new Comment;
        $comment->fill($savedata)->save();

        return redirect()->route('bookapp.slide.show', [$savedata['book_app_id']])->with('commentstatus','コメントを投稿しました');
    }
}
