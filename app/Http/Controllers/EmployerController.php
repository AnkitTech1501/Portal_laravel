<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string',
                'name' => 'required|string',
                'location' => 'required|string',
                'type' => 'required|string',
                'salary_range' => 'required|array|min:2|max:2', // Ensure salary_range is an array with exactly 2 elements (min, max)
                'salary_range.*' => 'integer|min:1000', // Each salary should be an integer and at least 1000
                'description' => 'required|string',
                'working_time' => 'required|string',
                'job_category' => 'required|string',
            ]);
            $employerData = [
                'title' => $validated['title'],
                'name' => $validated['name'],
                'location' => $validated['location'],
                'type' => $validated['type'],
                'salary_range' => json_encode($validated['salary_range']), // Save salary_range as JSON
                'description' => $validated['description'],
                'working_time' => $validated['working_time'],
                'job_category' => $validated['job_category'],
            ];
            return $employerData;
            $employer = Employer::create($employerData);

            return response()->json([
                'message' => 'Employer data inserted successfully!',
                'data' => $employer,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error inserting data: ' . $e->getMessage(),
            ], 500);
        }
    }
}

