<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class PostsController extends Controller
{
    //
    public function index(){
        $user = Auth::user();
        $posts = Posts::all();
        return view('posts.index', compact('user','posts'));
    }

    public function create(){
        return view('post.create');
    }

    public function store(Request $request){
        $posts = new Posts;
        $posts->post = $request->post;
        //データベースに保存
        $post->save();
        return redirect('/top');
    }

    public function edit($id){
        $posts = Posts::find($id);
        return view('post.edit',compact('posts'));
    }

    public function update(Request $request, $id) {
        $posts = Post::find($id);
        $posts->post = $request->post;
        return redirect('/top');
    }

    public function destroy($id){
        $posts = Posts::find($id);
        $items->delete();
        return redirect('/top');
    }
}
