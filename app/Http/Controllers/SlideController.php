<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\bookApp;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;


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
        // dd($slides->all());
        return view('bookapp.slide.index', compact('slides'));
    }

    public function create(Request $request)
    {
        $member =Auth::user();
        return view('bookapp.slide.create', ['member' => $member]);


    }

    public function store(Request $request)
    {
        $slide = new bookApp;
        $slide->user_id = Auth::id();;
        $slide->book_title = $request->book_title;
        $slide->book_detail = $request->book_detail;
        $today = date("Y-m-d");

        $image = $request->file('image');
        $path_image = Storage::disk('s3')->put('bookapp/bookimg'.$today , $image, 'public');
        $slide->image_path = Storage::disk('s3')->url($path_image);

        $slides_pdf = $request->file('slides_pdf');
        $path_slides = Storage::disk('s3')->put('bookapp/slides'.$today , $slides_pdf, 'public');
        $slide->slides_path = Storage::disk('s3')->url($path_slides);
        $slide->save();
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
        return view('bookapp.slide.edit', compact('slide'));
    }


    public function update(Request $request, $id)
    {
        $slide = bookApp::find($id);
        $slide->book_title = $request->book_title;
        $slide->book_detail = $request->book_detail;
        $image = $request->file('image');
        $path = Storage::disk('s3')->put('bookapp/bookimg', $image, 'public');
        $slide->image_path = Storage::disk('s3')->url($path);
        $slide->save();
        return redirect('/');
    }

    public function destroy($id)
    {
        $slide = bookApp::find($id);
        $slide->delete();
        return redirect('/');
    }
}
