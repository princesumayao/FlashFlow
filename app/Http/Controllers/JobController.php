<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function index()
    {
        return view('jobs.index');
    }

    public function jobs()
    {
        return view('jobs.postedJobs');
    }

    public function interviews()
    {
        return view('jobs.interviews');
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function applicantView()
    {
        return view('jobs.applicantView');
    }

    public function show()
    {
        return view('jobs.showJobs');
    }

    public function apply(){
        return view('jobs.apply');
    }

    public function interviewsApplicant()
    {
        return view('jobs.interviewsApplicant');
    }

    public function profileApplicant()
    {
        return view('jobs.profileApplicant');
    }
}
