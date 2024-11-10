<?php

namespace App\Http\Controllers;

use App\Models\WebContent;
use Illuminate\Http\Request;

class WebController extends Controller
{
    function edit_web_contents()
    {
        return view('pages.dashboard.web_content');
    }

    function get_web_content()
    {
        $content = WebContent::where('id', 1)->first();
        return response()->json([
            'status' => 'success',
            'content' => $content,
        ]);
    }

    function update_web_content(Request $request)
    {
        $present = WebContent::find($request->id);

        // Handle the logo update
        if ($request->hasFile('logo')) {
            // Delete the old logo if exists
            if ($present->logo != null) {
                $old_logo_path = public_path('upload/logo/' . $present->logo);
                if (file_exists($old_logo_path)) {
                    unlink($old_logo_path);
                }
            }

            // Upload the new logo
            $logo = $request->file('logo');
            $logo_name = $logo->getClientOriginalName();
            $logo->move(public_path('upload/logo'), $logo_name);

            // Update logo field in the database
            WebContent::find($request->id)->update([
                'logo' => $logo_name,
            ]);
        }

        // Update the rest of the content
        WebContent::find($request->id)->update([
            'footer' => $request->footer,
            'email' => $request->email,
            'number' => $request->number,
            'facebook' => $request->facebook,
            'twitter' => $request->twitter,
            'linkedin' => $request->linkedin,
            'instagram' => $request->instagram,
            'whatsapp' => $request->whatsapp,
            'telegram' => $request->telegram,
            'address' => $request->address,
            'contact_title' => $request->contact_title,
            'contact_desp' => $request->contact_desp,
            'slide' => $request->slide,
        ]);

        return response()->json([
            'status' => 'success',
        ], 201);
    }
}
