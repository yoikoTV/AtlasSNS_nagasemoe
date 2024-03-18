<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class FollowsController extends Controller
{
    //
    public function followList(){
        $user = Auth::user();
        return view('follows.followList', compact('user'));
    }
    public function followerList(){
        $user = Auth::user();
        return view('follows.followerList', compact('user'));
    }
}
