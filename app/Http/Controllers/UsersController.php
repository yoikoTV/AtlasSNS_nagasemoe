<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    //
    public function profile(){
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }
    public function search(){
        return view('users.search');
    }
}
