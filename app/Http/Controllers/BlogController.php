<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index(){
        $blogs= Blog::paginate(6);
        return view('blog',['blogs'=>$blogs]);
    }


    public function store(Request $request){

    }

    public function admin_index(){
        $blogs=Blog::get();
        return view('admin.showblog',['blogs'=>$blogs]);
    }

    public function admin_create(){
        return view('admin.create-blog');
    }

    public function admin_store(Request $request){
        $request->validate([
            'title'=>'required|max:200',
            'content'=>'required',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif,webp|max:1024',
        ]);

        if ($request->hasFile('image')) {
            // Handle the image upload
            $imagePath = $request->file('image')->store('images', 'public'); 
            $fullUrl = asset('storage/' . $imagePath);
            $blog=new Blog;
            $blog->image=$fullUrl;
            $blog->title=$request->input('title');
            $blog->content=$request->input('content');
            $blog->save();

            return back()->with('message','Blog created successfully');
        }

        return back()->withErrors('message','Failed to create blog');
    }

    public function admin_delete(Request $request){
        $request->validate([
            'blog_id'=>'required'
        ]);
        $blog = Blog::where('id',$request->input('blog_id'))->delete();
        if(!$blog){
            return back()->withErrors('message','Failed to delete this blog');
        };
        return back()->with('message','Blog deleted successfully');
    }
}
