<?php


use Illuminate\Support\Facades\Route;
use App\Models\Job;





Route::get('/', function () {

    return view("home");
});

Route::get('/jobs/index', function () {
    return view("jobs.index", [
        'jobs' => Job::with('employer')->latest()->cursorPaginate(3)
    ]);
});

Route::get('/jobs/create', function () {
    return view("jobs.create");
});

Route::get('/jobs/show/{id}', function ($id) {
    $job = Job::find((int) $id);
    return view("jobs.show", [
        'job' => $job
    ]);
});




Route::get('/contact', function () {
    return view("contact");
});

Route::post('/jobs', function () {
    
    request()->validate([
        'title' => 'required | min:3',
        'salary' => 'required',
    ]);

   Job::create([
    'title' => request('title'),
    'salary' => request('salary'),
    'employer_id' => 1,
   ]);

   return redirect('/jobs/index');
});
