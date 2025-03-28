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
                'type' => 'required|string',
                'salary_range' => 'required|array|min:2|max:2', // Ensure salary_range is an array with exactly 2 elements (min, max)
                'salary_range.*' => 'integer|min:1000', // Each salary should be an integer and at least 1000
                'description' => 'required|string',
                'start_time' => 'required|string',
                'end_time' => 'required|string',
                'job_category' => 'required|string',
                'address' => 'required|string',
                'city' => 'required|string',
                'state' => 'required|string',
                'employer_bond' => 'nullable|integer', // Nullable but should be an integer if provided
                'phone_number' => 'nullable|string', // Nullable but should be an integer if provided
                'company_name' => 'nullable|string', // Nullable string
                'food_allowance' => 'nullable|integer|in:0,1', // Nullable string
            ]);

            // Set default values if the data is not provided
            $employerData = [
                'title' => $validated['title'],
                'name' => $validated['name'],
                'type' => $validated['type'],
                'salary_range' => $validated['salary_range'], // Save salary_range as JSON
                'description' => $validated['description'],
                'start_time' => $validated['start_time'],
                'end_time' => $validated['end_time'],
                'job_category' => $validated['job_category'],
                'address' => $validated['address'],
                'city' => $validated['city'],
                'state' => $validated['state'],
                'bond_id' => $validated['employer_bond'] ?? null, // Default to null if not provided
                'phone_number' => $validated['phone_number'] ?? null, // Default to null if not provided
                'company_name' => $validated['company_name'] ?? null, // Default to null if not provided
                'food_allowance' => $validated['food_allowance'] ?? 0, // Default to null if not provided
            ];

            // Create the employer record
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

