<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;

use function PHPSTORM_META\registerArgumentsSet;

// Web Routes Definition


Route::view('/', 'home');

// Job routes for managing the complete job lifecycle (listing, creation, modification, removal)
Route::resource('jobs', JobController::class);
    // ,['except' => ['edit'],
    // 'only' => ['index', 'show', 'create', 'store', 'update', 'destroy']]


// route::controller(JobController::class)->group(function(){
//     Route::get('/jobs/index', 'index');
//     Route::get('/jobs/create', 'create');
//     Route::get('/jobs/{job}/edit', 'edit');
//     Route::patch('/jobs/{job}', 'update');
//     Route::delete('/jobs/{job}', 'destroy');
//     Route::get('/jobs/show/{job}', 'show');
//     Route::post('/jobs', 'store');
// });
      // option 2
// Route::get('/jobs/index', [JobController::class, 'index']);
// Route::get('/jobs/create', [JobController::class, 'create']);
// Route::get('/jobs/{job}/edit', [JobController::class, 'edit']);
// Route::patch('/jobs/{job}', [JobController::class, 'update']);
// Route::delete('/jobs/{job}', [JobController::class, 'destroy']);
// Route::get('/jobs/show/{job}', [JobController::class, 'show']);
// Route::post('/jobs', [JobController::class, 'store']);

// Contact page route
Route::view('/contact', 'contact');

Route::get('/register', [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login', [SessionController::class, 'create']);
Route::post('/login', [SessionController::class, 'store']);