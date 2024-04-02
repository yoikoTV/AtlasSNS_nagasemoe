<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post; //Postモデル（Postsテーブル）を使うuse宣言
use App\User;

class PostsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = Post::with('user')->get();
        return view('posts.index', compact('user','posts'));
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

    public function edit($id)
    {
        $user_id = Auth::user()->id;
        $posts = Post::find($id);
        return view('/top');
    }

    public function update(Request $request, $id)
    {
        $posts = Post::find($id);
        $posts->post = $request->post;
        return redirect('/top');
    }

    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();
        return redirect('/top');
    }

}
