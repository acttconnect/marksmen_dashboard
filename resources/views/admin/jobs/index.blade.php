@extends('admin.layouts.app')

@section('title', 'Job Openings')

@section('content')
<div class="mk-page">

    <div class="mk-page-header">
        <div>
            <div class="mk-eyebrow">RECRUITMENT MANAGEMENT</div>
            <h1>Job Openings</h1>
            <p>Manage company job openings and vacancies.</p>
        </div>

        <a href="{{ route('admin.jobs.create') }}" class="mk-create-btn">
            + Add Job
        </a>
    </div>

    @if(session('success'))
        <div class="mk-alert mk-alert-success">
            <span>{{ session('success') }}</span>
            <button type="button" class="mk-alert-close" onclick="this.parentElement.remove()">×</button>
        </div>
    @endif

    @if(session('error'))
        <div class="mk-alert mk-alert-danger">
            <span>{{ session('error') }}</span>
            <button type="button" class="mk-alert-close" onclick="this.parentElement.remove()">×</button>
        </div>
    @endif

    <div class="mk-card">
        <div class="mk-card-head">
            <div>
                <div class="mk-section-label">JOB FILTERS</div>
                <h2>Search & Filter</h2>
            </div>
        </div>

        <div class="mk-card-body">
            <form method="GET" action="{{ route('admin.jobs.index') }}">

                <div class="mk-job-filter-grid">

                    <div class="mk-field">
                        <label for="job-search">Search</label>
                        <input
                            id="job-search"
                            type="text"
                            name="search"
                            class="mk-input"
                            placeholder="Search title, department, location..."
                            value="{{ request('search') }}"
                        >
                    </div>

                    <div class="mk-field">
                        <label for="job-status">Status</label>
                        <select id="job-status" name="status" class="mk-select">
                            <option value="">All Status</option>
                            <option value="open" @selected(request('status') === 'open')>Open</option>
                            <option value="closed" @selected(request('status') === 'closed')>Closed</option>
                            <option value="draft" @selected(request('status') === 'draft')>Draft</option>
                        </select>
                    </div>

                    <div class="mk-field">
                        <label for="job-employment">Employment Type</label>
                        <select id="job-employment" name="employment_type" class="mk-select">
                            <option value="">All Employment</option>
                            @foreach(['Full Time','Part Time','Internship','Contract','Freelance'] as $type)
                                <option
                                    value="{{ $type }}"
                                    @selected(request('employment_type') === $type)
                                >
                                    {{ $type }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mk-field">
                        <label for="job-department">Department</label>
                        <input
                            id="job-department"
                            type="text"
                            name="department"
                            class="mk-input"
                            placeholder="e.g. IT"
                            value="{{ request('department') }}"
                        >
                    </div>

                </div>

                <div class="mk-job-filter-actions">
                    <button type="submit" class="mk-primary-btn">Filter</button>
                    <a href="{{ route('admin.jobs.index') }}" class="mk-secondary-btn">Reset</a>
                </div>

            </form>
        </div>
    </div>

    <div class="mk-card" style="margin-top:14px;">
        <div class="mk-card-head">
            <div>
                <div class="mk-section-label">JOB OPENINGS</div>
                <h2>All Job Openings</h2>
                <p>{{ $jobs->total() }} Jobs</p>
            </div>
        </div>

        <div class="mk-table-wrap">
            <table class="mk-table mk-job-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Job</th>
                        <th>Department</th>
                        <th>Employment</th>
                        <th>Location</th>
                        <th>Positions</th>
                        <th>Status</th>
                        <th>Deadline</th>
                        <th class="mk-text-right">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($jobs as $job)
                        <tr>
                            <td>
                                <span class="mk-id">
                                    #{{ $jobs->firstItem() + $loop->index }}
                                </span>
                            </td>

                            <td>
                                <div class="mk-job-title">{{ $job->title }}</div>
                                <div class="mk-job-title-sub">{{ $job->experience }}</div>
                            </td>

                            <td>
                                <span class="mk-job-meta">{{ $job->department }}</span>
                            </td>

                            <td>
                                <span class="mk-job-meta">{{ $job->employment_type }}</span>
                            </td>

                            <td>
                                <span class="mk-job-meta">{{ $job->location }}</span>
                            </td>

                            <td>
                                <span class="mk-job-position">{{ $job->open_positions }}</span>
                            </td>

                            <td>
                                @if($job->status === 'open')
                                    <span class="mk-job-status mk-job-status-open">Open</span>
                                @elseif($job->status === 'closed')
                                    <span class="mk-job-status mk-job-status-closed">Closed</span>
                                @else
                                    <span class="mk-job-status mk-job-status-draft">Draft</span>
                                @endif
                            </td>

                            <td>
                                @if($job->application_deadline)
                                    <span class="mk-job-meta">
                                        {{ $job->application_deadline->format('d M Y') }}
                                    </span>
                                @else
                                    <span class="mk-subtext">No Deadline</span>
                                @endif
                            </td>

                            <td class="mk-text-right">
                                <div class="mk-row-actions">

                                    <a
                                        href="{{ route('admin.jobs.show', $job) }}"
                                        class="mk-row-btn"
                                    >
                                        View
                                    </a>

                                    <a
                                        href="{{ route('admin.jobs.edit', $job) }}"
                                        class="mk-row-btn mk-row-btn-edit"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.jobs.destroy', $job) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this job?');"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="mk-row-btn mk-row-btn-delete">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="9">
                                <div class="mk-empty">
                                    <h3>No Job Openings Found</h3>
                                    <p>Create your first job opening to get started.</p>

                                    <a
                                        href="{{ route('admin.jobs.create') }}"
                                        class="mk-create-btn"
                                        style="margin-top:12px;"
                                    >
                                        + Add Job
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($jobs->hasPages())
            <div class="mk-pagination">
                {{ $jobs->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
