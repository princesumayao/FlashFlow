<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    //
    public function index(Request $request)
    {
        $featuredJobs = Job::where('featured', true)->where('status', 'active')->latest()->take(6)->get();

        $query = Job::where('status', 'active');

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('work_location')) {
            $query->where('work_location', $request->work_location);
        }

        $recentJobs = $query->latest()->take(10)->get();

        return view('jobs.index', [
            'featuredJobs' => $featuredJobs,
            'recentJobs' => $recentJobs
        ]);
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
