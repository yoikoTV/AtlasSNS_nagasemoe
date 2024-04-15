<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;

class UsersController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('users.search', compact('user'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        if(!empty($keyword)){
            $search_users = User::where('username','like','%'.$keyword.'%')->get();
        }else{
            $search_users = User::all();
        }
        return view('/top',['username'=>$search_users]);
    }
}
