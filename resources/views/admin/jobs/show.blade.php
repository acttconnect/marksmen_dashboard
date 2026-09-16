@extends('admin.layouts.app')

@section('title', 'Job Details')

@section('content')
<div class="mk-page">

    <div class="mk-page-header">
        <div>
            <div class="mk-eyebrow">RECRUITMENT MANAGEMENT</div>
            <h1>Job Details</h1>
            <p>View complete job opening information.</p>
        </div>

        <div class="mk-header-actions">
            <a href="{{ route('admin.jobs.index') }}" class="mk-secondary-btn">
                Back
            </a>

            <a href="{{ route('admin.jobs.edit', $job) }}" class="mk-primary-btn">
                Edit
            </a>
        </div>
    </div>

    <div class="mk-card">
        <div class="mk-card-head">
            <div>
                <div class="mk-section-label">JOB OPENING</div>
                <h2>{{ $job->title }}</h2>
                <p>Job ID: #{{ $job->id }}</p>
            </div>

            @if($job->status === 'open')
                <span class="mk-job-status mk-job-status-open">Open</span>
            @elseif($job->status === 'closed')
                <span class="mk-job-status mk-job-status-closed">Closed</span>
            @else
                <span class="mk-job-status mk-job-status-draft">Draft</span>
            @endif
        </div>

        <div class="mk-card-body">

            <div class="mk-job-show-grid">

                <div class="mk-job-detail">
                    <div class="mk-job-detail-label">Department</div>
                    <div class="mk-job-detail-value">{{ $job->department }}</div>
                </div>

                <div class="mk-job-detail">
                    <div class="mk-job-detail-label">Employment Type</div>
                    <div class="mk-job-detail-value">{{ $job->employment_type }}</div>
                </div>

                <div class="mk-job-detail">
                    <div class="mk-job-detail-label">Location</div>
                    <div class="mk-job-detail-value">{{ $job->location }}</div>
                </div>

                <div class="mk-job-detail">
                    <div class="mk-job-detail-label">Experience</div>
                    <div class="mk-job-detail-value">{{ $job->experience }}</div>
                </div>

                <div class="mk-job-detail">
                    <div class="mk-job-detail-label">Open Positions</div>
                    <div class="mk-job-detail-value">{{ $job->open_positions }}</div>
                </div>

                <div class="mk-job-detail">
                    <div class="mk-job-detail-label">Application Deadline</div>
                    <div class="mk-job-detail-value">
                        @if($job->application_deadline)
                            {{ $job->application_deadline->format('d M Y') }}
                        @else
                            <span class="mk-subtext">Not specified</span>
                        @endif
                    </div>
                </div>

                <div class="mk-job-detail full">
                    <div class="mk-job-detail-label">Qualification</div>
                    <div class="mk-job-detail-value">
                        {{ $job->qualification ?: 'Not specified' }}
                    </div>
                </div>

            </div>

            <div class="mk-card" style="margin-top:18px;">
                <div class="mk-card-head">
                    <div>
                        <div class="mk-section-label">SKILLS</div>
                        <h2>Required Skills</h2>
                    </div>
                </div>

                <div class="mk-card-body">
                    @if(!empty($job->skills))
                        <div class="mk-job-skills">
                            @foreach($job->skills as $skill)
                                <span class="mk-job-skill">{{ $skill }}</span>
                            @endforeach
                        </div>
                    @else
                        <span class="mk-subtext">No skills specified.</span>
                    @endif
                </div>
            </div>

            <div class="mk-card" style="margin-top:14px;">
                <div class="mk-card-head">
                    <div>
                        <div class="mk-section-label">DESCRIPTION</div>
                        <h2>Job Description</h2>
                    </div>
                </div>

                <div class="mk-card-body">
                    <div class="mk-job-content">
                        {{ $job->job_description }}
                    </div>
                </div>
            </div>

            <div class="mk-card" style="margin-top:14px;">
                <div class="mk-card-head">
                    <div>
                        <div class="mk-section-label">RESPONSIBILITIES</div>
                        <h2>Responsibilities</h2>
                    </div>
                </div>

                <div class="mk-card-body">
                    @if($job->responsibilities)
                        <div class="mk-job-content">{{ $job->responsibilities }}</div>
                    @else
                        <span class="mk-subtext">No responsibilities specified.</span>
                    @endif
                </div>
            </div>

            <div class="mk-card" style="margin-top:14px;">
                <div class="mk-card-head">
                    <div>
                        <div class="mk-section-label">REQUIREMENTS</div>
                        <h2>Candidate Requirements</h2>
                    </div>
                </div>

                <div class="mk-card-body">
                    @if($job->requirements)
                        <div class="mk-job-content">{{ $job->requirements }}</div>
                    @else
                        <span class="mk-subtext">No requirements specified.</span>
                    @endif
                </div>
            </div>

            <div class="mk-card" style="margin-top:14px;">
                <div class="mk-card-head">
                    <div>
                        <div class="mk-section-label">RECORD INFORMATION</div>
                        <h2>Job Record</h2>
                    </div>
                </div>

                <div class="mk-card-body">
                    <div class="mk-job-meta-grid">

                        <div class="mk-job-detail">
                            <div class="mk-job-detail-label">Job ID</div>
                            <div class="mk-job-detail-value">#{{ $job->id }}</div>
                        </div>

                        <div class="mk-job-detail">
                            <div class="mk-job-detail-label">Created</div>
                            <div class="mk-job-detail-value">
                                {{ $job->created_at->format('d M Y, h:i A') }}
                            </div>
                        </div>

                        <div class="mk-job-detail">
                            <div class="mk-job-detail-label">Last Updated</div>
                            <div class="mk-job-detail-value">
                                {{ $job->updated_at->format('d M Y, h:i A') }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="mk-card mk-job-danger" style="margin-top:14px;">
                <div class="mk-card-body">
                    <div class="mk-job-danger-body">
                        <div>
                            <h3 class="mk-job-danger-title">Delete Job Opening</h3>
                            <p class="mk-job-danger-text">
                                This action cannot be undone.
                            </p>
                        </div>

                        <form
                            action="{{ route('admin.jobs.destroy', $job) }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to permanently delete this job?');"
                        >
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="mk-danger-btn">
                                Delete Job
                            </button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
@endsection
