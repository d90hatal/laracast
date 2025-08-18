<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

// Web Routes Definition


// Home page route
Route::get('/', function () {
    return view("home");
});

// Display paginated list of jobs with their employers
Route::get('/jobs/index', function () {
    return view("jobs.index", [
        'jobs' => Job::with('employer')->latest()->cursorPaginate(3)
    ]);
});

// Show job creation form
Route::get('/jobs/create', function () {
    return view("jobs.create");
});

// Show job edit form
Route::get('/jobs/{id}/edit', function ($id) {
    $job = Job::find((int) $id);
    return view("jobs.edit", [
        'job' => $job
    ]);
});

// Update job
Route::patch('/jobs/{id}', function ($id) {
    // Validate form input
    request()->validate([
        'title' => 'required | min:3',
        'salary' => 'required',
    ]);

    // Update job
    $job = Job::findOrFail((int) $id);
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);
    return redirect('/jobs/show/' . $id);
}); 

// Delete job
Route::delete('/jobs/{id}', function ($id) {
    Job::findOrFail((int) $id)->delete();
    return redirect('/jobs/index');
});

// Display single job details
Route::get('/jobs/show/{id}', function ($id) {
    $job = Job::find((int) $id);
    return view("jobs.show", [
        'job' => $job
    ]);
});


// Contact page route
Route::get('/contact', function () {
    return view("contact");
});

// Handle job creation form submission
Route::post('/jobs', function () {
    // Validate form input
    request()->validate([
        'title' => 'required | min:3',
        'salary' => 'required',
    ]);

    // Create new job and assign to employer ID 1
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs/index');
});

