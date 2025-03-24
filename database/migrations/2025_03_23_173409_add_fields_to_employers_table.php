<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->string('title'); // Job title
            $table->string('name'); // Employer name
            $table->string('location'); // Location
            $table->string('type'); // Job type
            $table->json('salary_range'); // Salary range (store as JSON)
            $table->text('description'); // Job description
            $table->time('start_time'); // Start time
            $table->time('end_time'); // End time
            $table->string('job_category'); // Job category
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('employers', function (Blueprint $table) {
            $table->dropColumn([
                'title',
                'name',
                'location',
                'type',
                'salary_range',
                'description',
                'start_time',
                'end_time',
                'job_category',
            ]);
        });
    }
};
