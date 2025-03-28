<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    // Specify the table if it's not following Laravel's pluralization convention
    // protected $table = 'employers';

    // The attributes that are mass assignable.
    protected $fillable = [
        'title',
        'name',
        'location',
        'type',
        'salary_range',
        'description',
        'start_time',
        'end_time',
        'job_category',
        'address',
        'city',
        'state',
        'bond_id',
        'phone_number',
        'company_name',
        'food_allowance',
        'travel_allowance'
    ];

    // The attributes that should be cast to native types.
    protected $casts = [
        'salary_range' => 'array', // Ensure salary_range is treated as an array
        'start_time' => 'datetime:H:i', // Optional: If you want to format the start time as a Carbon instance
        'end_time' => 'datetime:H:i',   // Optional: Same as start time
    ];

    // If you want to use a different table name (e.g. not plural 'employers'),
    // you can specify it here.
    // protected $table = 'custom_table_name';
}
