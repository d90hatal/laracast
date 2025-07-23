<?php

use Illuminate\Support\Facades\Route;

 

$jobs = [
   
];

Route::get('/', function () {
    return view("home");
});

Route::get('/jobs', function () {               
    return view("jobs",
    ['jobs' => Job::all()]);
});

// Route::get('/jobs/{id}', function ($id) {
//     return view("job", [
//         'job' => Job::find($id)
//     ]);
// });



Route::get('/contact', function () {
    return view("contact");
});
