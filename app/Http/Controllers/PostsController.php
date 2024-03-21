<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;

class PostsController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        $posts = Post::all();
        return view('posts.index', compact('user','posts'));
    }

    public function create(){
        $user = Auth::user();
        $posts = Post::all();
        return view('posts.create', compact('user','posts'));
    }

    public function store(Request $request){
        $posts = new Post;
        $posts->post = $request->post;
        //データベースに保存
        $posts->save();
        return redirect('/top');
    }

    public function edit($id){
        $posts = Post::find($id);
        return view('posts.edit',compact('posts'));
    }

    public function update(Request $request, $id) {
        $posts = Post::find($id);
        $posts->post = $request->post;
        return redirect('/top');
    }

    public function destroy($id){
        $posts = Post::find($id);
        $items->delete();
        return redirect('/top');
    }
}
