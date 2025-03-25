<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function show($id)
    {
        try {
            $city = City::with('state')->where('state_id', $id)->get();
            return $city;
            if (!$city) {
                return response()->json(['message' => 'City not found'], 404);
            }

            return response()->json($city);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error fetching states', 'error' => $e->getMessage()], 500);
        }
    }
}
