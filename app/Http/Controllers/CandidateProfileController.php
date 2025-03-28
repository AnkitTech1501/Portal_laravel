<?php

namespace App\Http\Controllers;

use App\Models\CandidateProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CandidateProfileController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'mobile_no' => 'required|string|max:15',
            'dob' => 'required|string',
            'address' => 'required|string',
            'state' => 'required|string',
            'city' => 'required|string',
            'education' => 'required|string',
            'work_experience' => 'required|string',
            'looking_job' => 'required|string',
            'is_deleted' => 'nullable|boolean',
            'is_verify' => 'nullable|boolean',
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }
        $candidate = CandidateProfile::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'mobile_no' => $request->mobile_no,
            'dob' => $request->dob,
            'address' => $request->address,
            'state' => $request->state,
            'city' => $request->city,
            'education' => $request->education,
            'work_experience' => $request->work_experience,
            'looking_job' => $request->looking_job,
            'is_deleted' => $request->is_deleted ?? 0,
            'is_verify' => $request->is_verify ?? 0,
        ]);
        return response()->json([
            'message' => 'Candidate Profile created successfully',
            'data' => $candidate
        ], 201);
    }
}
