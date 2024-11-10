<?php


namespace App\Http\Controllers;

use App\Models\Visitor;
use Illuminate\Http\Request;

class TrackController extends Controller
{
    // public function visitor(Request $request)
    // {
    //     // Step 1: Get the visitor's IP address
    //     $ipAddress = $request->ip();


    //     $month = now()->format('F');

    //     $location = 'Unknown'; // You can replace this with actual geolocation data if needed.

    //     Visitor::create([
    //         'ip_address' => $ipAddress,
    //         'location' => $location,
    //         'month' => $month,
    //     ]);

    //     // Return a response (or you could redirect, return a view, etc.)
    //     return response()->json(['message' => 'Visitor data tracked successfully']);
    // }

    public function view_visitor(){
        $visitor = Visitor::groupBy('ip_address')->get();

        return view('pages.dashboard.track_visitor');
        
    }
}

