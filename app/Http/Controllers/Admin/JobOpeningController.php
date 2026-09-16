<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobOpeningRequest;
use App\Models\JobOpening;
use Illuminate\Http\Request;

class JobOpeningController extends Controller
{
    /**
     * Display job openings.
     */
    public function index(Request $request)
    {
        $query = JobOpening::query();

        // Search
        if ($request->filled('search')) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('department', 'like', "%{$search}%")
                    ->orWhere('employment_type', 'like', "%{$search}%")
                    ->orWhere('location', 'like', "%{$search}%")
                    ->orWhere('experience', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Department filter
        if ($request->filled('department')) {
            $query->where(
                'department',
                'like',
                '%' . $request->department . '%'
            );
        }

        $jobs = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.jobs.index', compact('jobs'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        return view('admin.jobs.create');
    }

    /**
     * Store job opening.
     */
    public function store(JobOpeningRequest $request)
    {
        $data = $request->validated();

        // Remove empty skills
        if (isset($data['skills'])) {
            $data['skills'] = array_values(
                array_filter($data['skills'], fn ($skill) => filled($skill))
            );
        } else {
            $data['skills'] = [];
        }

        JobOpening::create($data);

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'Job opening created successfully.');
    }

    /**
     * Display job opening.
     */
    public function show(JobOpening $job)
    {
        return view('admin.jobs.show', compact('job'));
    }

    /**
     * Show edit form.
     */
    public function edit(JobOpening $job)
    {
        return view('admin.jobs.edit', compact('job'));
    }

    /**
     * Update job opening.
     */
    public function update(
        JobOpeningRequest $request,
        JobOpening $job
    ) {
        $data = $request->validated();

        if (isset($data['skills'])) {
            $data['skills'] = array_values(
                array_filter($data['skills'], fn ($skill) => filled($skill))
            );
        } else {
            $data['skills'] = [];
        }

        $job->update($data);

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'Job opening updated successfully.');
    }

    /**
     * Delete job opening.
     */
    public function destroy(JobOpening $job)
    {
        $job->delete();

        return redirect()
            ->route('admin.jobs.index')
            ->with('success', 'Job opening deleted successfully.');
    }
}