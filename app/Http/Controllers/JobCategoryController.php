<?php

namespace App\Http\Controllers;

use App\Models\JobCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class JobCategoryController extends Controller
{
    public function index()
    {
        $cacheKey = 'job_categories';
        $jobCategories = Cache::remember($cacheKey, now()->addMinutes(10), function () {
            return JobCategories::all();
        });
        return response()->json($jobCategories);
    }
}
