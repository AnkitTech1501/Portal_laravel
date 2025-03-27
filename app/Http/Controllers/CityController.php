<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CityController extends Controller
{
    public function show($id)
    {
        try {
            $cacheKey = 'cities_state_' . $id;
            $city = Cache::get($cacheKey);
            if (!$city) {
                $city = City::with('state')->where('state_id', $id)->get();
                Cache::put($cacheKey, $city, 60); // Cache for 60 minutes
            }
            if ($city->isEmpty()) {
                return response()->json(['message' => 'City not found'], 404);
            }

            return response()->json($city);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error fetching cities', 'error' => $e->getMessage()], 500);
        }
    }
}
