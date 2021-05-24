<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bookApp;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use App\Services\SendToS3;
use App\Http\Requests\StoreSlides;
use App\Http\Requests\UpdateSlides;

class SlideController extends Controller
{
    public function index (Request $request)
    {
        $slides = bookApp::with('user')
                        ->orderByDesc('created_at')
                        ->paginate(15);
        $slides->loadCount('likes');
        $slides->loadCount(['likes as liked' => function (Builder $query) {
            $query->where('ip', '=', request()->ip());
        }]);

        return view('bookapp.slide.index', compact('slides'));
    }



    public function create()
    {
        $member =Auth::user();
        $tags = Tag::all();
        return view('bookapp.slide.create', ['member' => $member, 'tags'=>$tags]);
    }



    public function store(StoreSlides $request)
    {
        $slide = new bookApp;
        $slide->user_id = Auth::id();;
        $slide->book_title = $request->book_title;
        $slide->book_detail = $request->book_detail;
        $slide->output = $request->book_output;
        $slide->image_path = SendToS3::sendImage($request->file('image'));
        $slide->slides_path = SendToS3::sendPDF($request->file('slides_pdf'));

        $slide->save();
        $slide->tags()->attach(request()->tags);
        return redirect('/');
    }



    public function show($id)
    {
        $slide = bookApp::with('user')->find($id);
        $login_user = Auth::user();
        return view('bookapp.slide.show', compact('slide', 'login_user'));
    }



    public function edit($id)
    {
        $slide = bookApp::with('user')->find($id);
        $tags = $slide->tags->pluck('id')->toArray();
        $tagList = Tag::all();
        return view('bookapp.slide.edit', compact('slide', 'tags', 'tagList'));
    }



    public function update(UpdateSlides $request, $id)
    {
        $slide = bookApp::find($id);
        $slide->book_title = $request->book_title;
        $slide->book_detail = $request->book_detail;
        $slide->output = $request->book_output;
        if(null !== $request->file('image')){
            $slide->image_path = SendToS3::sendImage($request->file('image'));
        }
        if(null !== $request->file('slides_pdf')){
            $slide->slides_path = SendToS3::sendPDF($request->file('slides_pdf'));
        }
        $slide->tags()->sync(request()->tags);
        $slide->save();
        return redirect('/');
    }



    public function destroy($id)
    {
        $slide = bookApp::find($id);
        $slide->delete();
        $slide->tags()->detach();
        return redirect('/');
    }


    public function index_booklist()
    {
        $slides = bookApp::with('user')
                        ->orderByDesc('created_at')
                        ->paginate(36);

        return view('bookapp.slide.booklist', compact('slides'));
    }

    public function todolist()
    {
        return view('bookapp.slide.todolist');
    }
}
