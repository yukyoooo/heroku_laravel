<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\bookApp;
use Illuminate\Database\Eloquent\Builder;





class UserController extends Controller
{
    public function members(Request $request)
    {

        $query = DB::table('users');
        $query->select('id','name','nickname', 'introduction', 'favorite_book', 'favorite_book2','favorite_book3','created_at');
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
        // dd($user->nickname);

        return view('bookapp.user.edit',compact('user'));
    }

    public function update(Request $request)
    {
        $user_form = $request->all();
        $user = Auth::user();
        $user->fill($user_form)->save();
        return view('bookapp.user.index',compact('user'));
    }

    public function show($id)
    {
        $member= User::find($id);
        // $slides = DB::table('book_apps')->where('user_id', $member->id)->get();
        $slides = bookApp::with('user')
            ->where('user_id', $member->id)
            ->orderByDesc('created_at')
            ->get();
        $slides->loadCount('likes');
        $slides->loadCount(['likes as liked' => function (Builder $query) {
            $query->where('ip', '=', request()->ip());
        }]);
        return view('bookapp.user.show', compact('member', 'slides'));
    }

}
