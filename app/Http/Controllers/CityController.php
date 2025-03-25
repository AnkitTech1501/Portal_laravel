<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function show($id)
    {
        try{
            $city = City::with('state')->($id);

            if (!$city) {
                return response()->json(['message' => 'City not found'], 404);
            }
    
            return response()->json($city);
        }
      
    }
  
}
