<?php

namespace App\Http\Controllers\api;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreSlides;
use App\Models\bookApp;
use App\Services\SendToS3;
use App\Models\Teams;



use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $member =User::all();
        $tags = Tag::all();
        // return view('bookapp.slide.create', ['member' => $member, 'tags'=>$tags, 'book'=>$book]);
        return response()->json(['user' => $member, 'tags' => $tags]);

    }


    public function getJson(){
        return response()->json(['name' => 'john']);
    }



    public function store(StoreSlides $request)
    {
        $slide = new bookApp;
        $slide->user_id = $request->user;
        $slide->book_title = $request->book_title;
        $slide->book_detail = $request->book_detail;
        $slide->book_author = $request->book_author;
        $slide->book_publishedDate = $request->book_publishedDate;
        $slide->output = $request->book_output;
        $slide->image_path = $request->book_img;
        $slide->slides_path = SendToS3::sendPDF($request->file('slides_pdf'));
        if(null !== $request->file('upload_book_img')){
            $slide->image_path = SendToS3::sendImage($request->file('upload_book_img'));
        }
        $slide->save();
        $slide->tags()->attach(request()->tags);

        #teams通知
        // $postLink="https://outbook.work/show/".$slide->id;
        // $messageTeams = "新しい投稿があったよ -> <a href=".$postLink.">新しい投稿へ</a>";
        // $webhookUrl = config('teams.outbook');
        // // dd($webhookUrl);
        // Teams::notice('新投稿!!', $messageTeams, $webhookUrl);
        return redirect('/');
    }
}
