<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use User;

class UsersController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('users.search');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    public function search()
    {
        return view('users.search');
    }
}
