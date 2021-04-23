<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    public function user(Request $request)
    {

        $query = DB::table('users');
        $query->select('name', 'introduction', 'favorite_book', 'favorite_book2','favorite_book3','created_at');
        $query->orderBy('created_at', 'asc');
        $users = $query->paginate(20);

        return view('bookapp.user.user', compact('users'));
    }


    public function index()
    {
        $user = Auth::user();
        return view('bookapp.user.index',compact('user'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        return view('bookapp.user.edit',compact('user'));
    }

    public function update(Request $request)
    {
        $user_form = $request->all();
        $user = Auth::user();
        $user->fill($user_form)->save();
        return view('bookapp.user.index',compact('user'));
    }

}
