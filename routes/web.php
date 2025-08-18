<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

// Web Routes Definition


Route::get('/', function () {
    return view("home");
});

// Job routes for managing the complete job lifecycle (listing, creation, modification, removal)
Route::get('/jobs/index', [JobController::class, 'index']);
Route::get('/jobs/create', [JobController::class, 'create']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
Route::patch('/jobs/{job}', [JobController::class, 'update']);
Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
Route::get('/jobs/show/{job}', [JobController::class, 'show']);
Route::post('/jobs', [JobController::class, 'store']);

// Contact page route
Route::get('/contact', function () {
    return view("contact");
});
