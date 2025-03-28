<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateProfile extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'candidate_profiles';

    // Define the fillable fields (to allow mass assignment)
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'mobile_no',
        'dob',
        'address',
        'state',
        'city',
        'education',
        'work_experience',
        'looking_job',
        'is_deleted',
        'is_verify',
    ];

    // Define the attributes that are cast to native types (optional)
    protected $casts = [
        'is_deleted' => 'boolean',
        'is_verify' => 'boolean',
    ];
}
