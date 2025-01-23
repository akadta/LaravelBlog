<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Blog;

class BlogController extends Controller
{
    public function AdminBlog(Request $request){
        if($request->isMethod('post')){
            $data = $request->validate([
                'no'=>'required|numeric',
                'title'=>'required|max:20',
                'image'=>'required|image',
                'description'=>'required|max:255',
            ]);
            $data["image"] = $request->file('image')->store('images','public') ?? null;
            Blog::create($data);
            return redirect()->back()->with('success','successfully posted');
        }
        $posts = Blog::all();
        return view('admin.blog.create',compact('posts'));
    }
    public function editblog(Blog $blog){
        return view('admin.blog.edit',['post'=>$blog]);
    }
    public function updateblog(Request $request,Blog $blog){
        $data = $request->validate([
            'no'=>'required|numeric',
            'title'=>'required|max:20',
            'image'=>'required|image',
            'description'=>'required|max:255',
        ]);
        $data["image"] = $request->file('image')->store('images','public') ?? $blog->image;
        Storage::disk('public')->delete($blog->image);
        $blog->update($data);
        return redirect(route('admin.blog'))->with('success','successfully edited post'.$blog->no);
    }
    public function deleteblog(Blog $blog){
        $blog->delete();
        return back()->with('success','deleted post '.$blog->no.'successfully');
}
}