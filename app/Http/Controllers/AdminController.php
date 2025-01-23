<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Blog;
use App\Models\Comment;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function adminpasswordchange(){
        return view('admin.changepassword');
    }
    public function admindetailschange(){
        return view('admin.changedetails');
    }
    public function adminshowblog(){
        $posts = Blog::with('comment')->paginate(5);
        return view('admin.blog.show',compact('posts'));
    }
    public function admincommentmanage(){
        $posts = Blog::with('comment')->paginate(5);
        return view('admin.blog.manage',compact('posts'));
    }
    public function admindeletecomment(Comment $comment){
        $comment->delete();
        return back();
    }

}
