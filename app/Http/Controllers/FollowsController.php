<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
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
    public function posts(Request $request)
    {
        $following_users_posts = auth()->user()->follows()->pluck('id'); //idがあいまいとエラーが出る
        $posts = Post::whereIn('user_id', $following_users_posts)
                ->orWhere('user_id', auth()->id())
                ->orderBy('updated_at', 'desc')
                ->get();
        return view('follows.followList', compact('posts'));

        //whereIn('user_id', $followingUsers)は、Postテーブルの中からuser_idが$followingUsersに含まれている投稿を取得する条件を設定している。
        //論理的にOR演算。つまり、フォローしているユーザーの投稿または自分自身の投稿のいずれかを取得するという意味。
        //->orderBy('created_at', 'desc')は、取得した投稿をcreated_atカラムの降順（descで指定、新しいものから古いものへ）に並び替える条件を設定している。
    }

}
