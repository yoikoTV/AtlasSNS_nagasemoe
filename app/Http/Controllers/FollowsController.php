<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
use App\Follow;

class FollowsController extends Controller
{
    public function followList(){
        $user = Auth::user();
        $following_user = $user->follows()->get(); // follows()メソッドでフォローしているユーザーを取得
        $following_users_posts = auth()->user()->follows()->pluck('followed_id');
        $posts = Post::whereIn('user_id', $following_users_posts)
                ->orderBy('updated_at', 'desc')
                ->get();
        $following_count = Follow::where('following_id', $user->id)->count();
        $followed_count = Follow::where('followed_id', $user->id)->count();
        return view('follows.followList', compact('user','following_user','posts','following_count','followed_count'));

        // return view('follows.followList', compact('posts'));

        //whereIn('user_id', $followingUsers)は、Postテーブルの中からuser_idが$followingUsersに含まれている投稿を取得する条件を設定している。
        //->orderBy('created_at', 'desc')は、取得した投稿をcreated_atカラムの降順（descで指定、新しいものから古いものへ）に並び替える条件を設定している。
    }
    public function followerList(){
        $user = Auth::user();
        $followed_user = $user->followed()->get();
        $followed_users_posts = auth()->user()->followed()->pluck('following_id');
        $posts = Post::whereIn('user_id',$followed_users_posts)
                ->orderBy('updated_at', 'desc')
                ->get();
        $following_count = Follow::where('following_id', $user->id)->count();
        $followed_count = Follow::where('followed_id', $user->id)->count();
        return view('follows.followerList', compact('user','followed_user','posts','following_count','followed_count'));
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
