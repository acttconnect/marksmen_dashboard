@extends('admin.layouts.app')

@section('title', 'Job Applications')

@section('content')
<div class="mk-page">

    {{-- Page Header --}}
    
    {{-- Success --}}
    @if(session('success'))
        <div class="mk-alert mk-alert-success">
            <span>{{ session('success') }}</span>
            <button type="button" class="mk-alert-close" onclick="this.parentElement.remove()">×</button>
        </div>
    @endif

    {{-- Error --}}
    @if(session('error'))
        <div class="mk-alert mk-alert-danger">
            <span>{{ session('error') }}</span>
            <button type="button" class="mk-alert-close" onclick="this.parentElement.remove()">×</button>
        </div>
    @endif

    {{-- Validation --}}
    @if($errors->any())
        <div class="mk-alert mk-alert-danger">
            <div>
                <strong>Please fix the following errors:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

            <button type="button" class="mk-alert-close" onclick="this.parentElement.remove()">×</button>
        </div>
    @endif

    {{-- Filters --}}
    <div class="mk-card mk-filter-card">
        <div class="mk-card-head">
            <div>
                <div class="mk-section-label">FILTER APPLICATIONS</div>
                <h2>Search & Filter</h2>
            </div>
        </div>

        <div class="mk-card-body">
            <form action="{{ route('admin.applications.index') }}" method="GET">
                <div class="mk-filter-grid mk-application-filter-grid">


                    <div class="mk-field">
                        <label for="application-job">Job</label>
                        <select id="application-job" name="job" class="mk-select">
                            <option value="">All Jobs</option>

                            @foreach($jobs as $job)
                                <option
                                    value="{{ $job->id }}"
                                    @selected(request('job') == $job->id)
                                >
                                    {{ $job->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mk-filter-actions">
                        <button type="submit" class="mk-primary-btn">
                            Filter
                        </button>

                        <a
                            href="{{ route('admin.applications.index') }}"
                            class="mk-secondary-btn"
                        >
                            Reset
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>

    {{-- Applications --}}
    <div class="mk-card mk-application-card">
        <div class="mk-card-head">
            <div>
                <div class="mk-section-label">APPLICATIONS</div>
                <h2>All Applications</h2>

                <p>
                    Showing
                    {{ $applications->firstItem() ?? 0 }}
                    -
                    {{ $applications->lastItem() ?? 0 }}
                    of
                    {{ $applications->total() }}
                </p>
            </div>
        </div>

        <div class="mk-table-wrap">
            <table class="mk-table mk-application-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Applicant</th>
                        <th>Job</th>
                        <th>Contact</th>
                        <th>Experience</th>
                        <th>Status</th>
                        <th>Applied</th>
                        <th class="mk-text-right">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($applications as $application)
                        <tr>

                            <td>
                                <span class="mk-id">#{{ $application->id }}</span>
                            </td>

                            <td>
                                <div class="mk-applicant-name">
                                    {{ $application->full_name }}
                                </div>

                                @if($application->current_city)
                                    <div class="mk-subtext">
                                        {{ $application->current_city }}
                                    </div>
                                @endif
                            </td>

                            <td>
                                @if($application->jobOpening)
                                    <div class="mk-job-title">
                                        {{ $application->jobOpening->title }}
                                    </div>

                                    @if($application->jobOpening->department)
                                        <div class="mk-subtext">
                                            {{ $application->jobOpening->department }}
                                        </div>
                                    @endif
                                @else
                                    <span class="mk-danger-text">Job Deleted</span>
                                @endif
                            </td>

                            <td>
                                <div class="mk-contact-primary">
                                    {{ $application->mobile_number }}
                                </div>

                                <div class="mk-subtext mk-email">
                                    {{ $application->email }}
                                </div>
                            </td>

                            <td>
                                {{ $application->total_experience ?: '—' }}
                            </td>

                            <td>
                                @if($application->status === 'new')
                                    <span class="mk-status mk-status-new">New</span>
                                @elseif($application->status === 'reviewed')
                                    <span class="mk-status mk-status-reviewed">Reviewed</span>
                                @elseif($application->status === 'shortlisted')
                                    <span class="mk-status mk-status-shortlisted">Shortlisted</span>
                                @elseif($application->status === 'rejected')
                                    <span class="mk-status mk-status-rejected">Rejected</span>
                                @else
                                    <span class="mk-status">{{ ucfirst($application->status) }}</span>
                                @endif
                            </td>

                            <td>
                                <div class="mk-date">
                                    {{ $application->created_at->format('d M Y') }}
                                </div>
                                <div class="mk-subtext">
                                    {{ $application->created_at->format('h:i A') }}
                                </div>
                            </td>

                            <td class="mk-text-right">
                                <div class="mk-row-actions">

                                    <a
                                        href="{{ route('admin.applications.show', $application) }}"
                                        class="mk-row-btn"
                                    >
                                        View
                                    </a>

                                    <a
                                        href="{{ route('admin.applications.edit', $application) }}"
                                        class="mk-row-btn mk-row-btn-edit"
                                    >
                                        Edit
                                    </a>

                                    @if($application->resume_path)
                                        <a
                                            href="{{ route('admin.applications.resume', $application) }}"
                                            class="mk-row-btn mk-row-btn-resume"
                                        >
                                            Resume
                                        </a>
                                    @endif

                                    <form
                                        action="{{ route('admin.applications.destroy', $application) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this application?');"
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
                            <td colspan="8">
                                <div class="mk-empty">
                                    <h3>No Applications Found</h3>
                                    <p>No job applications match your current filters.</p>
                                </div>
                            </td>
                        </tr>

                    @endforelse
                </tbody>
            </table>
        </div>

        @if($applications->hasPages())
            <div class="mk-pagination">
                {{ $applications->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
