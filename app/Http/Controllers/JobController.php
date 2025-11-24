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

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('work_location')) {
            $query->where('work_location', $request->work_location);
        }

        $recentJobs = $query->latest()->take(10)->get();

        $locations = Job::where('status', 'active')
            ->distinct()
            ->pluck('location')
            ->filter()
            ->sort()
            ->values();

        return view('jobs.index', [
            'featuredJobs' => $featuredJobs,
            'recentJobs' => $recentJobs,
            'locations' => $locations
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
        // Get the current employer
        $employer = Auth::user()->employer;

        // Get applications for jobs posted by this employer with pending interviews
        $pendingInterviews = \App\Models\Interview::with([
            'application.job.employer',
            'application.user'
        ])->whereHas('application.job', function($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })->where('status', 'pending')->get();

        // Get approved interviews
        $approvedInterviews = \App\Models\Interview::with([
            'application.job.employer',
            'application.user'
        ])->whereHas('application.job', function($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })->where('status', 'approved')->get();

        return view('jobs.interviews', compact('pendingInterviews', 'approvedInterviews'));
    }

    public function approveInterview(\App\Models\Interview $interview)
    {
        $interview->update([
            'status' => 'approved',
            'approved_at' => now()
        ]);

        return redirect()->back()->with('success', 'Interview approved successfully');
    }

    public function disapproveInterview(\App\Models\Interview $interview)
    {
        $interview->update([
            'status' => 'disapproved',
            'approved_at' => null
        ]);

        return redirect()->back()->with('success', 'Interview disapproved successfully');
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
