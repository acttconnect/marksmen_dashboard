<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use App\Models\JobOpening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ApplicationController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $applications = JobApplication::with('jobOpening')
            ->where('email', $user->email)
            ->latest()
            ->paginate(10);

        return view(
            'user.applications.index',
            compact('applications')
        );
    }

    public function create(JobOpening $job)
    {
        abort_if($job->status !== 'open', 404);

        return view(
            'user.applications.create',
            compact('job')
        );
    }

    public function store(Request $request, JobOpening $job)
    {
        abort_if($job->status !== 'open', 404);

        $validated = $request->validate([
            'full_name' => [
                'required',
                'string',
                'max:255'
            ],

            'mobile_number' => [
                'required',
                'string',
                'max:20'
            ],

            'email' => [
                'required',
                'email',
                'max:255'
            ],

            'current_city' => [
                'required',
                'string',
                'max:255'
            ],

            'total_experience' => [
                'required',
                'string',
                'max:100'
            ],

            'highest_qualification' => [
                'nullable',
                'string',
                'max:255'
            ],

            'resume' => [
                'required',
                'file',
                'mimes:pdf,doc,docx',
                'max:5120'
            ],

            'brief_note' => [
                'nullable',
                'string'
            ],
        ]);

        $resumePath = $request->file('resume')
            ->store(
                'job-applications/resumes',
                'public'
            );

        JobApplication::create([
            'job_opening_id' => $job->id,
            'full_name' => $validated['full_name'],
            'mobile_number' => $validated['mobile_number'],
            'email' => $validated['email'],
            'current_city' => $validated['current_city'],
            'total_experience' => $validated['total_experience'],
            'highest_qualification' =>
                $validated['highest_qualification'] ?? null,
            'resume_path' => $resumePath,
            'brief_note' =>
                $validated['brief_note'] ?? null,
            'status' => 'new',
        ]);

        return redirect()
            ->route('user.applications.index')
            ->with(
                'success',
                'Your application has been submitted successfully.'
            );
    }
}