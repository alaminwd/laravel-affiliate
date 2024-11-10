<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    function category(){
        return view('pages.dashboard.category_list');
    }

    function category_list(){
        return Category::all();
    }

    function category_create(Request $request){
        $request->validate([
            'category_name'=>'unique:categories',
        ]);

        Category::create([
            'category_name'=>$request->category_name,
            'slug'=>$request->slug,
        ]);
        return response()->json([
            'status'=>'success',
            'message'=>'Category Created Successfully',
        ], status:201);
    }

    function category_delete(Request $request){
        $category_id = $request->category_id;
        Category::find($category_id)->delete();
        return response()->json([
            'status'=>'success',
        ]);
    }

    function category_update(Request $request){
        $category_id = $request->category_id;
        Category::find($category_id)->update([
            'category_name'=>$request->category_name,
            'slug'=>$request->slug,
        ]);
        return response()->json([
            'status'=>'success',
        ]);
    }
}
