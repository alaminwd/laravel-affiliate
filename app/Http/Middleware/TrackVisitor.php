<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TrackVisitor
{
    public function handle(Request $request, Closure $next)
    {
        try {
            // Get the visitor's IP address
            $ipAddress = $request->ip();

            // Get the current month and year (to track monthly)
            $currentMonth = Carbon::now()->format('Y-m');
            $currentYear = Carbon::now()->year;
            $currentMonthText = Carbon::now()->format('F');

            // Fetch location data from an external IP geolocation API
            $response = Http::get("http://ipinfo.io/{$ipAddress}/json");

            if ($response->failed()) {
                // Handle failure case, e.g., log the error
                $location = 'Unknown'; // Default fallback location
            } else {
                $locationData = $response->json();
                $location = isset($locationData['city']) && isset($locationData['region']) && isset($locationData['country'])
                    ? $locationData['city'] . ', ' . $locationData['region'] . ', ' . $locationData['country']
                    : 'Unknown';
            }

            // Check if the visitor has already visited this month
            $visitor = Visitor::where('ip_address', $ipAddress)
                            ->whereYear('updated_at', $currentYear)
                            ->whereMonth('updated_at', Carbon::now()->month)
                            ->first();

            if (! $visitor) {
                // New visitor
                Visitor::create([
                    'ip_address' => $ipAddress,
                    'location' => $location,
                    'month' => $currentMonthText,
                ]);
            }

        } catch (\Exception $e) {
            Log::error('Error in Visitor Middleware: ' . $e->getMessage());
        }

        return $next($request);
    }

}
