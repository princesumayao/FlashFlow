<?php

use App\Http\Controllers\FilterController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

// for login and chuchubel
Route::middleware('guest')->group(function () {
    Route::get('/', [SessionController::class, 'create'])->name('login');
    Route::post('/login', [SessionController::class, 'store']);
    Route::get('/registerEmployer', [RegisteredController::class, 'createEmployer']);
    Route::post('/registerEmployer', [RegisteredController::class, 'storeEmployer']);
    Route::get('/registerApplicant', [RegisteredController::class, 'createApplicant']);
    Route::post('/registerApplicant', [RegisteredController::class, 'storeApplicant']);
});

// for sec purposes
Route::middleware('auth')->group(function () {
    Route::delete('/logout', [SessionController::class, 'destroy'])->name('logout');

    // home and search routes
    Route::get('/home', [JobController::class, 'index'])->name('home');
    Route::get('/featured', [JobController::class, 'featured'])->name('featured');
    Route::get('/search', SearchController::class)->name('search');
    Route::get('/filter', FilterController::class)->name('filter');

    // profile routes
    Route::prefix('profile')->group(function () {
        Route::get('/edit', [RegisteredController::class, 'editProfile'])->name('profile.edit');
        Route::put('/', [RegisteredController::class, 'updateProfile'])->name('profile.update');
    });

    // specific job view routes
    Route::prefix('job')->group(function () {
        Route::get('/{job}', [JobController::class, 'showJob'])->name('job.show');
        Route::get('/{job}/apply', [JobController::class, 'showApply'])->name('job.apply');
        Route::post('/{job}/apply', [JobController::class, 'storeApplication'])->name('job.apply.store');
    });

    // employer job management routes
    Route::prefix('jobs')->group(function () {
        // Job CRUD routes
        Route::get('/create', [JobController::class, 'create'])->name('jobs.create');
        Route::post('/', [JobController::class, 'store'])->name('jobs.store');
        Route::get('/{job}/edit', [JobController::class, 'edit'])->name('jobs.edit');
        Route::put('/{job}', [JobController::class, 'update'])->name('jobs.update');
        Route::delete('/{job}', [JobController::class, 'destroy'])->name('jobs.destroy');
    });

// Employer profile routes (separate prefix)
    Route::prefix('employer')->group(function () {
        Route::get('/{id}', [JobController::class, 'jobs'])->name('jobs.employer');
        Route::get('/{id}/all', [JobController::class, 'allJobs'])->name('jobs.all');
    });

    //interview routes
    Route::prefix('interviews')->group(function () {
        Route::get('/', [JobController::class, 'interviews'])->name('interviews.index');
        Route::get('/{type}/all', [JobController::class, 'allInterviews'])->name('interviews.all');
        Route::post('/{interview}/approve', [JobController::class, 'approveInterview'])->name('interviews.approve');
        Route::post('/{interview}/disapprove', [JobController::class, 'disapproveInterview'])->name('interviews.disapprove');
    });

    Route::get('/applicant/profile', [JobController::class, 'profileApplicant']);

});
