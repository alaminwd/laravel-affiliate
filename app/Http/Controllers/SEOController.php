<?php

namespace App\Http\Controllers;

use App\Models\SEO;
use Illuminate\Http\Request;

class SEOController extends Controller
{
    function add_seo()
    {
        return view('pages.dashboard.add_seo');
    }

    function seo_create(Request $request)
    {

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $extension = $img->getClientOriginalExtension();
            $img_name = substr(str_replace(' ', '-', $request->slug), 0, 15) . '.' . $extension;
            $img->move(public_path('upload/seo'), $img_name);
            SEO::create([
                'img'=>$img_name,
            ]);
        }

        SEO::create([
            'slug' => $request->slug,
            'title' => $request->title,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'published_time' => $request->published_time,
            'modified_time' => $request->modified_time,
            'author' => $request->author,
            'canonical' => $request->canonical,
            'og_locale' => $request->og_locale,
            'og_url' => $request->og_url,
            'og_type' => $request->og_type,
            'twitter_card' => $request->twitter_card,
            'twitter_site' => $request->twitter_site,
            'twitter_label' => $request->twitter_label,
            'twitter_data' => $request->twitter_data,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'SEO Page added Successful!',
        ]);
    }

    function get_seo()
    {
        return SEO::all();
    }

    function seo_delete(Request $request)
    {
        $present = SEO::find($request->seo_id);
        if ($present->img != null) {
            unlink(public_path('upload/seo/' . $present->img));
        }
        $present->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }

    function seo_update(Request $request)
    {
        if ($request->hasFile('img')) {
            $present = SEO::find($request->seo_id);
            if ($present->img != null) {
                unlink(public_path('upload/seo/' . $present->img));
            }

            $img = $request->file('img');
            $extension = $img->getClientOriginalExtension();
            $img_name = substr(str_replace(' ', '-', $request->slug), 0, 15) . '.' . $extension;
            $img->move(public_path('upload/seo'), $img_name);
            $present->update([
                'img' => $img_name,
            ]);
        }
        SEO::find($request->seo_id)->update([
            'slug' => $request->slug,
            'title' => $request->title,
            'description' => $request->description,
            'keywords' => $request->keywords,
            'published_time' => $request->published_time,
            'modified_time' => $request->modified_time,
            'author' => $request->author,
            'canonical' => $request->canonical,
            'og_locale' => $request->og_locale,
            'og_url' => $request->og_url,
            'og_type' => $request->og_type,
            'twitter_card' => $request->twitter_card,
            'twitter_site' => $request->twitter_site,
            'twitter_label' => $request->twitter_label,
            'twitter_data' => $request->twitter_data,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'SEO Updated Successful!',
        ]);
    }
}
