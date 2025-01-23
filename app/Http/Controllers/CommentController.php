<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function usercomment(Request $request,$id){
        $request->validate([
            'comment'=>'required|max:255',
        ]);
        Comment::create([
            'blog_id'=>$id,
            'user_id'=>Auth::id(),
            'comment'=>$request->comment,
        ]);
        return redirect(route('user.blogshow'));
    }
    public function usercommentdelete(Comment $comment){
        if(Auth::id()!==$comment->user_id){
return back();
        }
        $comment->delete();
        return redirect()->back();
    }
    public function usercommentedit(Comment $comment){
        return view('user.comment.edit',['comment'=>$comment]);
    }
    public function usercommentupdate(Request $request,Comment $comment){
        $data=$request->validate([
            'comment'=>'required|max:255',
        ]);
        $comment->update($data);
        return redirect(route('user.blogshow'));
    }
}
