<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = Job::query()->with(['employer'])->where('status', 'active');

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        if ($request->filled('location')) {
            $query->where('location', $request->location);
        }

        if ($request->filled('work_location')) {
            $query->where('work_location', $request->work_location);
        }

        $jobs = $query->latest()->get();

        return view('jobs.result', ['jobs' => $jobs]);
    }
}
