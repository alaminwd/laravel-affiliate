<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    function admin_product()
    {
        return view('pages.dashboard.product_list');
    }

    function get_product()
    {
        return Product::all();
    }

    // desp suggestion
    public function getDespSuggestions(Request $request)
    {
        $query = $request->input('query');

        // If there's a query, filter descriptions by it; otherwise, return the latest 10 descriptions
        $descriptions = $query
            ? Product::where('desp', 'LIKE', "%{$query}%")->pluck('desp')->take(10)
            : Product::latest()->pluck('desp')->take(10);

        return response()->json($descriptions);
    }

    function product_create(Request $request)
    {

        // Validate product name for uniqueness
        $request->validate([
            'product_name' => 'unique:products',
        ]);

        // Generate random values for SKU and slug
        $random = random_int(1000, 9990);
        $random2 = random_int(10099, 99999);

        // Generate SKU and slug
        $sku = Str::upper(str_replace(' ', '_', substr($request->product_name, 0, 2))) . '_' . $random;
        $slug = Str::upper(str_replace(' ', '_', substr($request->product_name, 0, 10))) . '_' . $random2;

        // Handle preview image
        $preview_img = $request->file('preview');
        $extension = $preview_img->getClientOriginalExtension();
        $file_name = Str::lower(str_replace(' ', '_', substr($request->product_name, 0, 10))) . '_' . $random . '.' . $extension;
        $preview_img->move(public_path('upload/product/preview'), $file_name);

        // Create the product and get the created product model
        $product = Product::create([
            'product_link' => $request->product_link,
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'desp' => $request->desp,
            'sku' => $sku,
            'slug' => $slug,
            'preview' => $file_name,
        ]);

        // Handle gallery images if provided
        if ($request->has('gallery')) {
            $gallery_img = $request->gallery;

            foreach ($gallery_img as $sl => $gallery) {
                $gall_extension = $gallery->getClientOriginalExtension();
                $gall_name = Str::lower(str_replace(' ', '_', substr($request->product_name, 0, 10))) . '_' . $random . $sl . '.' . $gall_extension;
                $gallery->move(public_path('upload/product/gallery'), $gall_name);

                // Create gallery images using create function
                ProductGallery::create([
                    'product_id' => $product->id,
                    'gallery' => $gall_name,
                ]);
            }
        }

        // Return success response
        return response()->json([
            'status' => 'success',
        ], 201);
    }


    function product_delete(Request $request)
    {

        $present = Product::find($request->product_id);
        unlink(public_path('upload/product/preview/' . $present->preview));

        $present_gallery = ProductGallery::where('product_id', $request->product_id)->get();
        foreach ($present_gallery as $gallery) {
            unlink(public_path('upload/product/gallery/' . $gallery->gallery));
            ProductGallery::where('product_id', $gallery->product_id)->delete();
        }

        $present->delete();

        return response()->json([
            'status' => 'success',
        ]);
    }

    public function get_product_gallery($product_id)
    {
        // Retrieve the product with its related gallery images
        $product = Product::with('galleries')->find($product_id);

        // Check if the product exists
        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found.'
            ], 404);
        }

        // Check if the product has any gallery images
        if ($product->galleries->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'message' => 'No gallery images found for this product.'
            ], 404);
        }

        // Return the gallery images in a JSON response
        return response()->json([
            'status' => 'success',
            'data' => $product->galleries
        ], 200);
    }

    public function product_update(Request $request)
    {
        // Find the product by ID
        $product = Product::find($request->product_id);

        $random = random_int(1000, 9990);
        $random2 = random_int(10099, 99999);

        // Generate SKU and slug
        $sku = Str::upper(str_replace(' ', '_', substr($request->product_name, 0, 2))) . '_' . $random;
        $slug = Str::upper(str_replace(' ', '_', substr($request->product_name, 0, 10))) . '_' . $random2;

        // Handle preview image update if not null
        if ($request->hasFile('preview')) {
            unlink(public_path('upload/product/preview/' . $product->preview));


            // Upload the new preview image
            $preview_img = $request->file('preview');
            $extension = $preview_img->getClientOriginalExtension();
            $file_name2 = Str::lower(str_replace(' ', '_', substr($request->product_name, 0, 10))) . '_' . $random . '.' . $extension;
            $preview_img->move(public_path('upload/product/preview'), $file_name2);
            $product->update([
                'preview' => $file_name2,
            ]);
        }

        $product_gallery = ProductGallery::where('product_id', $request->product_id)->get();
        if ($request->hasFile('gallery')) {
            if ($product_gallery->isNotEmpty()) {
                // Unlink the old gallery images if they exist
                foreach ($product_gallery as $galleryImage) {
                    unlink(public_path('upload/product/gallery/' . $galleryImage->gallery));
                }
                // Delete the existing gallery entries
                ProductGallery::where('product_id', $request->product_id)->delete();
            }

            // Upload and save new gallery images
            foreach ($request->gallery as $sl => $gallery) {
                $gall_extension = $gallery->getClientOriginalExtension();
                $gall_name2 = Str::lower(str_replace(' ', '_', substr($request->product_name, 0, 10))) . '_' . $random . $sl . '.' . $gall_extension;
                $gallery->move(public_path('upload/product/gallery'), $gall_name2);

                // Create gallery images using create function
                ProductGallery::create([
                    'product_id' => $product->id,
                    'gallery' => $gall_name2,
                ]);
            }
        }

        $product->update([
            'product_link' => $request->product_link,
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'desp' => $request->desp,
            'sku' => $sku,
            'slug' => $slug,
        ]);

        return response()->json();
    }
}
