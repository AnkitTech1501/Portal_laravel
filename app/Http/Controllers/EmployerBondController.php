<?php

namespace App\Http\Controllers;

use App\Models\EmployerBond;
use Illuminate\Support\Facades\Cache;
class EmployerBondController extends Controller
{
    public function index()
    {
        try {
            $cacheKey = 'all_employer_bonds';
            $employerBonds = Cache::get($cacheKey);
            if (!$employerBonds) {
                $employerBonds = EmployerBond::all();
                Cache::put($cacheKey, $employerBonds, 60); // Cache for 60 minutes
            }
            return response()->json($employerBonds);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error fetching employer bonds', 'error' => $e->getMessage()], 500);
        }
    }
}
