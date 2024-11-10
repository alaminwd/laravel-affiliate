<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    function add_blog(){
        return view('pages.dashboard.add_blog');
    }

    function blog_create(Request $request){
        $img = $request->file('img');
        $extension = $img->getClientOriginalExtension();
        $img_name = substr(str_replace(' ', '-',$request->title), 0, 10).'.'.$extension;
        $img->move(public_path('upload/blog'), $img_name);

        Blog::create([
            'slug'=>$request->slug,
            'title'=>$request->title,
            'desp'=>$request->desp,
            'img'=>$img_name,
        ]);

        return response()->json([
            'status'=>'success',
            'message'=>'Blog added Successful!',
        ]);
    }

    function get_blog(){
        return Blog::all();
    }

    function blog_delete(Request $request){
        $present = Blog::find($request->blog_id);
        if($present->img != null){
            unlink(public_path('upload/blog/'.$present->img));
        }
        $present->delete();
        return response()->json([
            'status'=>'success',
        ]);
    }

    function blog_update(Request $request){
        if($request->hasFile('img')){
            $present = Blog::find($request->blog_id);
            if($present->img != null){
                unlink(public_path('upload/blog/'.$present->img));
            }
            
            $img = $request->file('img');
            $extension = $img->getClientOriginalExtension();
            $img_name = substr(str_replace(' ', '-',$request->title), 0, 10).'.'.$extension;
            $img->move(public_path('upload/blog'), $img_name);
            $present->update([
                'img'=>$img_name,
            ]);

        }
        Blog::find($request->blog_id)->update([
            'slug'=>$request->slug,
            'title'=>$request->title,
            'desp'=>$request->desp,
        ]);

        return response()->json([
            'status'=>'success',
            'message'=>'Blog Updated Successful!',
        ]);

    }
}
