<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Interview;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    //
    public function index()
    {
        $featuredJobs = Job::where('featured', true)->where('status', 'active')->latest()->take(6)->get();
        $recentJobs = Job::where('status', 'active')->latest()->take(10)->get();

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
    public function create()
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Please login first');
        }

        // Check if user is an employer
        if (Auth::user()->user_type !== 'employer') {
            return redirect('/applicant/home')->with('error', 'Access denied');
        }

        // Check if user has employer profile
        if (!Auth::user()->employer) {
            return redirect('/home')->with('error', 'Please complete your employer profile first');
        }

        // Pass the employer data to the view
        $employer = Auth::user()->employer;

        return view('jobs.create', compact('employer'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|in:Full Time,Part Time',
            'work_location' => 'required|in:Work From Home,Onsite',
            'salary_min' => 'required|numeric|min:0',
            'salary_max' => 'required|numeric|min:0',
            'quote' => 'required|string'
        ]);

        // Get the current user's employer record
        $employer = Auth::user()->employer;

        if (!$employer) {
            return redirect('/home')->with('error', 'Please complete your employer profile first');
        }

        Job::create([
            'employer_id' => $employer->id,
            'title' => $request->title,
            'description' => $request->quote,
            'location' => $request->location,
            'type' => $request->type,
            'work_location' => $request->work_location,
            'salary_min' => $request->salary_min,
            'salary_max' => $request->salary_max,
            'status' => 'active'
        ]);

        return redirect('/home')->with('success', 'Job posted successfully!');
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
        $pendingInterviews = Interview::with([
            'application.job.employer',
            'application.user'
        ])->whereHas('application.job', function($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })->where('status', 'pending')->get();

        // Get approved interviews
        $approvedInterviews = Interview::with([
            'application.job.employer',
            'application.user'
        ])->whereHas('application.job', function($query) use ($employer) {
            $query->where('employer_id', $employer->id);
        })->where('status', 'approved')->get();

        return view('jobs.interviews', compact('pendingInterviews', 'approvedInterviews'));
    }

    public function edit(Job $job)
    {
        // Check if user owns this job
        if ($job->employer_id !== Auth::user()->employer->id) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        $employer = Auth::user()->employer;
        return view('jobs.edit', compact('job', 'employer'));
    }

    public function update(Request $request, Job $job)
    {
        // Check if user owns this job
        if ($job->employer_id !== Auth::user()->employer->id) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|in:Full Time,Part Time',
            'work_location' => 'required|in:Work From Home,Onsite',
            'salary_min' => 'required|numeric|min:0',
            'salary_max' => 'required|numeric|min:0',
            'quote' => 'required|string'
        ]);

        $job->update([
            'title' => $request->title,
            'description' => $request->quote,
            'location' => $request->location,
            'type' => $request->type,
            'work_location' => $request->work_location,
            'salary_min' => $request->salary_min,
            'salary_max' => $request->salary_max,
        ]);

        return redirect("/jobs/{$job->employer_id}")->with('success', 'Job updated successfully!');
    }

    public function destroy(Job $job)
    {
        // Check if user owns this job
        if ($job->employer_id !== Auth::user()->employer->id) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        $job->delete();

        return redirect()->back()->with('success', 'Job deleted successfully!');
    }

    // shhhhhh dyan muna kayo

    public function approveInterview(Interview $interview)
    {
        $interview->update([
            'status' => 'approved',
            'approved_at' => now()
        ]);

        return redirect()->back()->with('success', 'Interview approved successfully');
    }

    public function disapproveInterview(Interview $interview)
    {
        $interview->update([
            'status' => 'disapproved',
            'approved_at' => null
        ]);

        return redirect()->back()->with('success', 'Interview disapproved successfully');
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
        $user = Auth::user();
        $applicant = $user->applicant;
        $credentials = $user->credentials; // Add this line

        return view('jobs.profileApplicant', compact('user', 'applicant', 'credentials'));
    }
}
