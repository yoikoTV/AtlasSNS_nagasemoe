<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Validation\Rule;
use App\Post;
use App\User;

class UsersController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $search_users = User::all();
        return view('users.search', compact('user','search_users'));
    }

    public function profile($id)
    {
        $other_user= User::where('id', $id)->first();
        $user = Auth::user();
        $posts = Post::where('user_id', $id)
                ->orderBy('updated_at', 'desc')
                ->get();
        return view('users.profile', compact('user','other_user','posts'));
    }

    public function profileEdit(Request $request)
    {
        $user = Auth::user();
        return view('users.profileEdit', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $validated = $request->validate([
        'username' => 'required|min:2|max:12',
        'mail' => [
            'required','min:5','max:40','email',
            Rule::unique('users')->ignore($request->user()->id)],
        'password' => 'required|min:8|max:20|alpha-num|confirmed',
        'bio' => 'max:150',
        'images' => 'mimes:jpg,png,bmp,gif,svg'
        ]);

        $id = Auth::id();
        $up_username = $request->input('username');
        $up_mail = $request->input('mail');
        $up_password = $request->input('password');
        $up_bio = $request->input('bio');

        if(file_exists($request->file('images'))){
            $up_images = $request->file('images');
            $path = $up_images->store('public/images');

            User::where('id', $id)->update([
                'images' => $path
            ]);
        };

        User::where('id', $id)->update([
               'username' => $up_username,
               'mail' => $up_mail,
               'password' => bcrypt($up_password),
               'bio' => $up_bio,
        ]);
        return redirect('/myprofile');
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $keyword = $request->input('keyword');
        //dd($keyword);
        if(!empty($keyword)){
            $search_users = User::where('username','like','%'.$keyword.'%')->get();
        }else{
            $search_users = User::all();
        }
        return view('users.search',compact('search_users','user'),['username'=>$search_users],);
    }
}
