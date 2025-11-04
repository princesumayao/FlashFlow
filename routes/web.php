<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredController;
use App\Http\Controllers\SessionController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', [JobController::class, 'index']);
Route::get('/jobs/{id}', [JobController::class, 'jobs']);
Route::get('/interviews',[JobController::class, 'interviews']);
Route::get('/jobs/create', [JobController::class, 'create']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);

Route::delete('/logout', [SessionController::class, 'destroy']);

Route::get('/registerEmployer', [RegisteredController::class, 'createEmployer']);

Route::get('/registerApplicant', [RegisteredController::class, 'createApplicant']);

Route::get('/applicant/home', [JobController::class, 'applicantView']);

Route::get('/jobs/1',[JobController::class, 'show']);

Route::get('/jobs/1/apply', [JobController::class, 'apply']);

Route::get('/applicant/interviews', [JobController::class, 'interviewsApplicant']);
Route::get('/applicant/profile', [JobController::class, 'profileApplicant']);
