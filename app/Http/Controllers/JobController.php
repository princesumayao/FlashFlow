<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function jobs($id)
    {
        $employer = Employer::with('user')->findOrFail($id);
        $jobs = $employer->jobs()->latest()->get();

        return view('jobs.postedJobs', compact('employer', 'jobs'));
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
