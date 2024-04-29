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

    public function follow(Request $request)
    {
        $following_id = Auth::user()->id;
        $followed_id = $request->input('followed_id');

        Follow::create([
            'following_id' => $following_id,
            'followed_id' => $followed_id,
        ]);

        return redirect('/search');
    }

    public function unfollow($id)
    {
        Follow::where('id', $id)->delete();
        return redirect('/search');
    }
}
