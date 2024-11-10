<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function add_page(){
        return view('pages.dashboard.dynamicPage');
    }

    function page_create(Request $request){

        Page::create([
            'slug'=>$request->slug,
            'title'=>$request->title,
            'short_desp'=>$request->short_desp,
            'desp'=>$request->desp,
        ]);

        return response()->json([
            'status'=>'success',
            'message'=>'Page added Successful!',
        ]);
    }

    function get_page(){
        return Page::all();
    }

    function page_delete(Request $request){

        Page::find($request->page_id)->delete();
        
        return response()->json([
            'status'=>'success',
        ]);
    }

    function page_update(Request $request){
        
        Page::find($request->page_id)->update([
            'slug'=>$request->slug,
            'title'=>$request->title,
            'short_desp'=>$request->short_desp,
            'desp'=>$request->desp,
        ]);

        return response()->json([
            'status'=>'success',
            'message'=>'Page Updated Successful!',
        ]);

    }
}
