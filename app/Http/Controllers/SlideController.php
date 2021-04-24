<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SlideController extends Controller
{
    public function index (Request $request)
    {
        $query = DB::table('book_apps');
        $slides = $query->paginate(30);
        return view('bookapp.slide.index', compact('slides'));
    }

    public function create()
    {
        $members = DB::table('users')->get();
        return view('bookapp.slide.create', ['members' => $members]);
    }
}
