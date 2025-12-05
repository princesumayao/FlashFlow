<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Employer;
use App\Models\Interview;
use App\Models\Job;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class JobController extends Controller
{
    use AuthorizesRequests;
    public function index()
    {
        $featuredJobs = Job::where('featured', true)->where('status', 'active')->latest()->take(6)->get();
        $recentJobs = Job::where('status', 'active')->latest()->paginate(5);

        $locations = Job::where('status', 'active')
            ->distinct()
            ->pluck('location')
            ->filter()
            ->sort()
            ->values();

        return view('jobs.index', ['featuredJobs' => $featuredJobs, 'recentJobs' => $recentJobs, 'locations' => $locations]);
    }
    public function create()
    {
        if (!Auth::check()) {
            return redirect('/')->with('error', 'Please login first');
        }

        if (Auth::user()->user_type !== 'employer') {
            return redirect('/home')->with('error', 'Access denied');
        }

        if (!Auth::user()->employer) {
            return redirect('/home')->with('error', 'Please complete your employer profile first');
        }

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
            'quote' => 'required|string',
            'featured' => 'nullable|boolean'
        ]);

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
            'featured' => $request->has('featured') ? true : false,
            'status' => 'active'
        ]);

        return redirect('/home')->with('success', 'Job posted successfully!');
    }
    public function featured()
    {
        $jobs = Job::where('featured', true)->where('status', 'active')->latest()->get();

        return view('jobs.result', compact('jobs'));
    }
    public function jobs($id)
    {
        $employer = Employer::with('user')->findOrFail($id);

        if (!Auth::user()->employer || Auth::user()->employer->id != $employer->id) {
            return redirect('/home')->with('error', 'You can only view your own profile.');
        }

        $jobs = $employer->jobs()->latest()->get();
        return view('jobs.postedJobs', compact('employer', 'jobs'));
    }

    public function allJobs($id)
    {
        $employer = Employer::with('user')->findOrFail($id);

        if (Auth::user()->employer && Auth::user()->employer->id === $employer->id) {
            $jobs = $employer->jobs()->latest()->get();
            return view('jobs.allJobs', compact('jobs', 'employer'));
        }

        return redirect('/employer/' . auth()->user()->employer->id)->with('error', 'You can only view your own posted jobs.');
    }
    public function interviews()
    {
        $user = Auth::user();

        if ($user->user_type === 'employer') {
            $employer = $user->employer;

            $pendingInterviews = Interview::with([
                'application.job.employer',
                'application.user'
            ])->whereHas('application.job', function($query) use ($employer) {
                $query->where('employer_id', $employer->id);
            })->where('status', 'pending')->get();

            $approvedInterviews = Interview::with([
                'application.job.employer',
                'application.user'
            ])->whereHas('application.job', function($query) use ($employer) {
                $query->where('employer_id', $employer->id);
            })->where('status', 'approved')->get();

            $viewType = 'employer';

        } else {

            $pendingInterviews = Interview::with([
                'application.job.employer',
                'application.user'
            ])->whereHas('application', function($query) use ($user) {
                $query->where('user_id', $user->id);
            })->where('status', 'pending')->get();

            $approvedInterviews = Interview::with([
                'application.job.employer',
                'application.user'
            ])->whereHas('application', function($query) use ($user) {
                $query->where('user_id', $user->id);
            })->where('status', 'approved')->get();

            $viewType = 'applicant';
        }

        return view('jobs.interviews', compact('pendingInterviews', 'approvedInterviews', 'viewType'));
    }

    public function allInterviews($type)
    {
        $user = Auth::user();

        if ($user->user_type === 'employer') {
            $employer = $user->employer;

            if ($type === 'pending') {
                $interviews = Interview::with([
                    'application.job.employer',
                    'application.user'
                ])->whereHas('application.job', function($query) use ($employer) {
                    $query->where('employer_id', $employer->id);
                })->where('status', 'pending')->get();
            } else {
                $interviews = Interview::with([
                    'application.job.employer',
                    'application.user'
                ])->whereHas('application.job', function($query) use ($employer) {
                    $query->where('employer_id', $employer->id);
                })->where('status', 'approved')->get();
            }

            $viewType = 'employer';
        } else {
            if ($type === 'pending') {
                $interviews = Interview::with([
                    'application.job.employer',
                    'application.user'
                ])->whereHas('application', function($query) use ($user) {
                    $query->where('user_id', $user->id);
                })->where('status', 'pending')->get();
            } else {
                $interviews = Interview::with([
                    'application.job.employer',
                    'application.user'
                ])->whereHas('application', function($query) use ($user) {
                    $query->where('user_id', $user->id);
                })->where('status', 'approved')->get();
            }

            $viewType = 'applicant';
        }

        return view('jobs.allInterviews', compact('interviews', 'viewType', 'type'));
    }

    public function edit(Job $job)
    {
        $this->authorize('update', $job);

        $employer = Auth::user()->employer;
        return view('jobs.edit', compact('job', 'employer'));
    }

    public function update(Request $request, Job $job)
    {
        $this->authorize('update', $job);

        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'type' => 'required|in:Full Time,Part Time',
            'work_location' => 'required|in:Work From Home,Onsite',
            'salary_min' => 'required|numeric|min:0',
            'salary_max' => 'required|numeric|min:0',
            'quote' => 'required|string',
            'featured' => 'nullable|boolean'
        ]);

        $job->update([
            'title' => $request->title,
            'description' => $request->quote,
            'location' => $request->location,
            'type' => $request->type,
            'work_location' => $request->work_location,
            'salary_min' => $request->salary_min,
            'salary_max' => $request->salary_max,
            'featured' => $request->has('featured') ? true : false,
        ]);

        return redirect("/employer/{$job->employer_id}")->with('success', 'Job updated successfully!');
    }

    public function destroy(Job $job)
    {
        $this->authorize('delete', $job);

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

    public function showJob(Job $job)
    {
        return view('jobs.showJobs', compact('job'));
    }

    public function showApply(Job $job)
    {
        return view('jobs.apply', compact('job'));
    }

    public function storeApplication(Request $request, Job $job)
    {
        $existingApplication = Application::where('job_id', $job->id)->where('user_id', Auth::id())->first();

        if ($existingApplication) {
            return redirect()->back()->with('error', 'You have already applied to this job.');
        }

        $validated = $request->validate([
            'resume' => 'required|file|mimes:pdf|max:2048',
            'message' => 'nullable|string|max:500'
        ]);

        $resumePath = $request->file('resume')->store('resumes', 'public');

        $application = Application::create([
            'job_id' => $job->id,
            'user_id' => Auth::id(),
            'status' => 'pending',
            'message' => $validated['message'] ?? null,
            'resume_path' => $resumePath,
        ]);

        Interview::create([
            'application_id' => $application->id,
            'status' => 'pending',
        ]);

        return redirect('/home')->with('success', 'Application submitted successfully!');
    }
    public function profileApplicant()
    {
        $user = Auth::user();
        $applicant = $user->applicant;
        $credentials = $user->credentials;

        return view('jobs.profileApplicant', compact('user', 'applicant', 'credentials'));
    }

}
