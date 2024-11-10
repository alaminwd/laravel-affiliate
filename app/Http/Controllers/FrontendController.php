<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function index()
    {
        $products = Product::latest()->paginate(120);
        return view('pages.frontend.index', [
            'products' => $products,
        ]);
    }

    function single_category($slug)
    {
        $slug_info = Category::where('slug', $slug)->first(); // Already gets the first record
        if ($slug_info) {
            $category_id = $slug_info->id; // Use the ID from the $slug_info
            $category_info = Category::find($category_id); // Find the category using the ID
            $products = Product::where('category_id', $category_info->id)->latest()->paginate(120); // Fetch products based on the category ID
            return view('pages.frontend.single_category', [
                'category_info' => $category_info,
                'products' => $products,
            ]);
        } else {
            return redirect('/')->with('error', 'Category not found'); // Handle cases where slug is invalid
        }
    }


    function single_product($slug)
    {
        $slug_info = Product::where('slug', $slug)->get();
        $product_id = $slug_info->first()->id;
        $product_info = Product::find($product_id);
        $galleries = ProductGallery::where('product_id', $product_id)->get();
        $related_products = Product::where('category_id', $product_info->category_id)
            ->where('id', '!=', $product_id)
            ->orderBy('created_at', 'desc')
            ->paginate(120);
        $blogs = Blog::latest()->take(3)->get();
        return view('pages.frontend.single_product', [
            'product_info' => $product_info,
            'galleries' => $galleries,
            'related_products' => $related_products,
            'blogs' => $blogs,

        ]);
    }

    function about_us()
    {
        $page = Page::where('slug', 'about-us')->first();
        return view('pages.frontend.about', compact('page'));
    }

    function blog()
    {
        $blogs = Blog::latest()->paginate(10);
        return view('pages.frontend.blog', compact('blogs'));
    }

    function single_blog($slug)
    {
        $blog = Blog::where('slug', $slug)->first();
        return view('pages.frontend.single_blog', compact('blog'));
    }

    function show_dynamic_page($slug)
    {
        $page = Page::where('slug', $slug)->first();
        return view('pages.frontend.dynamic_page', compact('page'));
    }

    function contact()
    {
        return view('pages.frontend.contact');
    }

    // In ProductController.php
    public function productSearch(Request $request)
    {
        $data = $request->all();

        // Fetch products matching the search query
        $products = Product::where(function ($q) use ($data) {
            if (!empty($data['q']) && $data['q'] != '' && $data['q'] != 'undefined') {
                $q->where(function ($q) use ($data) {
                    $q->where('product_name', 'like', '%' . $data['q'] . '%');
                });
            }
        })->latest()->paginate(12);

        // Return JSON response
        return view('pages.frontend.index', compact('products'));
    }


    // customer login 
    public function customer_login()
    {
        if (session('customer_logged_in')) {
            return redirect(url('/'));
        }
        return view('pages.frontend.auth.password_login');
    }

    // Handle the AJAX password login
    public function customer_login_post(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        // Get the first customer as an example (you can customize this query)
        $customer = Customer::first();

        // Check if the password matches
        if ($customer && $request->password === $customer->password) {
            session(['customer_logged_in' => true]);

            return response()->json([
                'success' => true,
                'message' => 'Login successful',
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Incorrect password',
            ]);
        }
    }
}
