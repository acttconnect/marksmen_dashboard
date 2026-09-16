<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobApplicationRequest;
use App\Models\JobApplication;
use App\Models\JobOpening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    public function index(Request $request)
{
    $query = JobApplication::with('jobOpening')
        ->latest();

    /*
    |--------------------------------------------------------------------------
    | Search
    |--------------------------------------------------------------------------
    */

    if ($request->filled('search')) {

        $search = $request->search;

        $query->where(function ($q) use ($search) {

            $q->where('full_name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('mobile_number', 'like', "%{$search}%")
                ->orWhere('current_city', 'like', "%{$search}%");

        });
    }


    /*
    |--------------------------------------------------------------------------
    | Job Filter
    |--------------------------------------------------------------------------
    */

    if ($request->filled('job')) {

        $query->where(
            'job_opening_id',
            $request->job
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Status Filter
    |--------------------------------------------------------------------------
    */

    if ($request->filled('status')) {

        $query->where(
            'status',
            $request->status
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Pagination
    |--------------------------------------------------------------------------
    */

    $applications = $query
        ->paginate(10)
        ->withQueryString();


    /*
    |--------------------------------------------------------------------------
    | Jobs for Filter
    |--------------------------------------------------------------------------
    */

    $jobs = JobOpening::orderBy('title')
        ->get();


    return view(
        'admin.applications.index',
        compact(
            'applications',
            'jobs'
        )
    );
}

    public function show(JobApplication $application)
    {
        $application->load('jobOpening');

        return view(
            'admin.applications.show',
            compact('application')
        );
    }

    public function edit(JobApplication $application)
    {
        $jobs = JobOpening::orderBy('title')->get();

        return view(
            'admin.applications.edit',
            compact('application', 'jobs')
        );
    }

    public function update(
        JobApplicationRequest $request,
        JobApplication $application
    ) {
        $data = $request->validated();

        if ($request->hasFile('resume')) {
            if (
                $application->resume_path &&
                Storage::disk('public')->exists(
                    $application->resume_path
                )
            ) {
                Storage::disk('public')->delete(
                    $application->resume_path
                );
            }

            $data['resume_path'] = $request
                ->file('resume')
                ->store('job-applications/resumes', 'public');
        } else {
            $data['resume_path'] = $application->resume_path;
        }

        $application->update($data);

        return redirect()
            ->route('admin.applications.index')
            ->with(
                'success',
                'Job application updated successfully.'
            );
    }

    public function destroy(JobApplication $application)
    {
        if (
            $application->resume_path &&
            Storage::disk('public')->exists(
                $application->resume_path
            )
        ) {
            Storage::disk('public')->delete(
                $application->resume_path
            );
        }

        $application->delete();

        return redirect()
            ->route('admin.applications.index')
            ->with(
                'success',
                'Job application deleted successfully.'
            );
    }
}