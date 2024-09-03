<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post; //Postモデル（Postsテーブル）を使うuse宣言
use App\User;
use App\Follow;

class PostsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = Post::with('user')->get();
        $following_count = Follow::where('following_id', $user->id)->count();
        $followed_count = Follow::where('followed_id', $user->id)->count();
        return view('posts.index', compact('user','posts','following_count','followed_count'));
    }

    public function create()
    {
        $user = Auth::user();
        $posts = Post::with('user')->get();
        return view('posts.index', compact('user','posts'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        //dd($user_id);
        $posts = $request->input('post');
        //dd($posts);
        $request -> validate([
            'post' => 'required|max:150'
        ]);
        Post::create([
            'post' => $posts,
            'user_id' => $user_id,
        ]);
        return redirect('/top');
    }

    public function edit()
    {
        $user_id = Auth::user()->id;
        $posts = Post::with('user')->get();
        return view('/top');
    }

    public function update(Request $request)
    {
        $request -> validate([
            'up_post' => 'required|max:150'
            //name属性のこと
        ]);
        $id = $request->input('up_post_id');
        $up_post = $request->input('up_post'); //name属性のこと
        //dd($up_post);
        Post::where('id', $id)->update([
               'post' => $up_post
        ]);
        return redirect('/top');
    }

    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/top');
    }
}
