<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Follow;

class FollowsController extends Controller
{
    //
    public function followList(){
        $user = Auth::user();
        $following_user = $user->follows()->get(); // follows()メソッドでフォローしているユーザーを取得
        return view('follows.followList', compact('user','following_user'));
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

    public function unfollow(Request $request)
    {
        $follow = Follow::where('following_id', Auth::id())
                        ->where('followed_id', $request->input('followed_id'))
                        ->first();

        if ($follow) {
            $follow->delete();
            return back()->with('success', 'フォローを解除しました。');
        }

        return back()->with('error', 'フォロー解除に失敗しました。');
    }


}
