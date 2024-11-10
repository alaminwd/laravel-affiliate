<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        // Get the visitor's IP address
        $ipAddress = $request->ip();

        // Get the current month and year (to track monthly)
        $currentMonth = Carbon::now()->format('Y-m');
        $currentYear = Carbon::now()->year;
        $currentMonthText = Carbon::now()->format('F');
        

        // Fetch location data from an external IP geolocation API
        $response = Http::get("http://ipinfo.io/{$ipAddress}/json");
        $locationData = $response->json();
        $location = isset($locationData['city']) && isset($locationData['region']) && isset($locationData['country'])
            ? $locationData['city'] . ', ' . $locationData['region'] . ', ' . $locationData['country']
            : 'Unknown';

        // Check if the visitor has already visited this month
        $visitor = Visitor::where('ip_address', $ipAddress)
                          ->whereYear('created_at', $currentYear)
                          ->whereMonth('created_at', Carbon::now()->month)
                          ->first();

        if ($visitor) {
            return $next($request);
        }

        // If it's a new visitor or a visitor from a previous month, store or update
        $existingVisitor = Visitor::where('ip_address', $ipAddress)->first();

        if ($existingVisitor) {
            // Visitor update with the current month
            $existingVisitor->update([
                'location' => $location,
                'updated_at' => now(),
                'month' => $currentMonthText
            ]);
        } else {
            // New visitor
            Visitor::create([
                'ip_address' => $ipAddress,
                'location' => $location,
                'month' => $currentMonthText,
            ]);
        }   

        return $next($request);
    }
}
