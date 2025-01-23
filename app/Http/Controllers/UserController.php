<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;

class UserController extends Controller
{
    public function home(){
        return view('user.home');
    }
    public function userpasswordchange(){
        return view('user.changepassword');
    }
    public function userdetailschange(){
        return view('user.changedetails');
    }
    public function blogshow(){
        $posts = Blog::with('comment')->get();
        return view('user.comment.show',compact('posts'));
    }
}
