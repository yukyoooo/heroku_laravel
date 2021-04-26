<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\bookApp;
use App\Models\User;

class SlideController extends Controller
{
    public function index (Request $request)
    {
        $slides = bookApp::with('user')
                        ->orderByDesc('created_at')
                        ->paginate(15);


        return view('bookapp.slide.index', compact('slides'));
    }

    public function create(Request $request)
    {
        $members = DB::table('users')->get();
        return view('bookapp.slide.create', ['members' => $members]);


    }

    public function store(Request $request)
    {
        $slide = new bookApp;
        // dd($request->book_detail);
        $slide->user_id = $request->member;
        $slide->book_title = $request->book_title;
        $slide->book_detail = $request->book_detail;
        $slide->save();
        return redirect('/');
    }

    public function show($id)
    {
        $slide = bookApp::with('user')->find($id);
        // dd($slide->user->name);
        return view('bookapp.slide.show', compact('slide'));
    }

    public function edit($id)
    {
        //
        $slide = bookApp::with('user')->find($id);
        return view('bookapp.slide.edit', compact('slide'));
    }


    public function update(Request $request, $id)
    {
        $slide = bookApp::find($id);
        $slide->book_title = $request->book_title;
        $slide->book_detail = $request->book_detail;
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
