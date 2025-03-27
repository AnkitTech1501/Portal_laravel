<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class StateController extends Controller
{
    public function index()
    {
        try {
            $cacheKey = 'all_states';
            $states = Cache::get($cacheKey);
            if (!$states) {
                $states = State::all();
                Cache::put($cacheKey, $states, 60); // Cache for 60 minutes
            }
            return response()->json($states);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error fetching states', 'error' => $e->getMessage()], 500);
        }
    }
}
