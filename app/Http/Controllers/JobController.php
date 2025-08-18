<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    public function index(){
        return view("jobs.index", [
            'jobs' => Job::with('employer')->latest()->cursorPaginate(3)
        ]);
    }

    public function create(){
        return view("jobs.create");
    }

    public function show(Job $job){
        return view("jobs.show", ['job' => $job]);
    }

    public function edit(Job $job){
        return view("jobs.edit", ['job' => $job]);
    }

    public function update(Job $job){
        request()->validate([
            'title' => 'required | min:3',
            'salary' => 'required',
        ]);

        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);
        return redirect()->route('jobs.show', $job);
    }

    public function destroy(Job $job){
        $job->delete();
        return redirect()->route('jobs.index');
    }

    public function store(){
        request()->validate([
            'title' => 'required | min:3',
            'salary' => 'required',
        ]);

        $newJob = Job::create([
            'title' => request('title'),
            'salary' => request('salary'),
            'employer_id' => 1,
        ]);
        return redirect()->route('jobs.index');
    }

}