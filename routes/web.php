<?php

use App\Http\Controllers\FilterController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);
Route::delete('/logout', [SessionController::class, 'destroy']);

Route::get('/home', [JobController::class, 'index']);

Route::get('/filter', FilterController::class);

// posted jobs routes
Route::get('/employer/profile/edit', [RegisteredController::class, 'editEmployer']);
Route::put('/employer/profile', [RegisteredController::class, 'updateEmployer']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
Route::put('/jobs/{job}', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);

Route::get('/jobs/create', [JobController::class, 'create']);
Route::get('/jobs/{id}', [JobController::class, 'jobs']);
Route::get('/interviews',[JobController::class, 'interviews']);
Route::post('/jobs', [JobController::class, 'store']);


Route::get('/search', SearchController::class);

Route::get('/registerEmployer', [RegisteredController::class, 'createEmployer']);

Route::get('/registerApplicant', [RegisteredController::class, 'createApplicant']);

Route::get('/applicant/home', [JobController::class, 'applicantView']);

Route::get('/jobs/1',[JobController::class, 'show']);

Route::get('/jobs/1/apply', [JobController::class, 'apply']);

Route::get('/applicant/interviews', [JobController::class, 'interviewsApplicant']);
Route::get('/applicant/profile', [JobController::class, 'profileApplicant']);

Route::post('/interviews/{interview}/approve', [JobController::class, 'approveInterview']);
Route::post('/interviews/{interview}/disapprove', [JobController::class, 'disapproveInterview']);
