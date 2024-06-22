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
        $follow = new Follow();
        $follow->following_id = Auth::id(); // 現在ログインしているユーザーのID
        $follow->followed_id = $request->input('followed_id'); // フォロー対象のユーザーのID
        $follow->save();

        return back()->with('success', 'ユーザーをフォローしました。');
    }

    public function unfollow($id)
    {
        Follow::where('id', $id)->delete();
        return redirect('/search');
    }
}
