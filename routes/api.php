<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\EmployerBondController;
use App\Http\Controllers\JobCategoryController;
use App\Http\Controllers\CandidateProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/employers', [EmployerController::class, 'store']);
Route::get('/employers_show', [EmployerController::class, 'show']);
Route::get('/employers_job', [EmployerController::class, 'created_job']);
Route::get('/job_details/{id}', [EmployerController::class, 'job_details']);
Route::get('/cities/{id}', [CityController::class, 'show']);
Route::get('/states', [StateController::class, 'index']);
Route::get('/employers_bond', [EmployerBondController::class, 'index']);
Route::get('/job_categories', [JobCategoryController::class, 'index']);
Route::get('/candidate_profiles', [CandidateProfileController::class, 'store']);
