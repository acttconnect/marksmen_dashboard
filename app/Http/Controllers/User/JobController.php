<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JobOpening;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $jobs = JobOpening::query()
            ->where('status', 'open')
            ->where(function ($query) {
                $query->whereNull('application_deadline')
                    ->orWhereDate(
                        'application_deadline',
                        '>=',
                        now()->toDateString()
                    );
            })
            ->when($request->filled('search'), function ($query) use ($request) {

                $search = $request->search;

                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhere('department', 'like', "%{$search}%")
                        ->orWhere('location', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('user.jobs.index', compact('jobs'));
    }

    public function show(JobOpening $job)
    {
        abort_if($job->status !== 'open', 404);

        return view('user.jobs.show', compact('job'));
    }
}