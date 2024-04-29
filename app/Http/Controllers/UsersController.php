<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $search_users = User::all();
        return view('users.search', compact('user','search_users'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $keyword = $request->input('keyword');
        //dd($keyword);
        if(!empty($keyword)){
            $search_users = User::where('username','like','%'.$keyword.'%')->get();
        }else{
            $search_users = User::all();
        }
        return view('users.search',compact('search_users','user'),['username'=>$search_users],);
    }
}
