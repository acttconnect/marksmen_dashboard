@extends('admin.layouts.app')

@section('title', 'Application Details')

@section('content')
<div class="app-page">

    <div class="app-header">
        <div>
            <div class="app-eyebrow">RECRUITMENT MANAGEMENT</div>
            <h1>Application Details</h1>
            <p>Candidate application information.</p>
        </div>

        <div class="app-header-actions">
            <a href="{{ route('admin.applications.index') }}" class="app-secondary-btn">Back</a>
            <a href="{{ route('admin.applications.edit', $application) }}" class="app-primary-btn">Edit Application</a>
        </div>
    </div>

    <div class="app-grid">

        <div>

            <div class="app-card">
                <div class="app-card-head">
                    <div>
                        <div class="app-section-label">CANDIDATE INFORMATION</div>
                        <h2>{{ $application->full_name }}</h2>
                        <p>Applicant contact and professional details.</p>
                    </div>
                </div>

                <div class="app-detail-grid">
                    <div class="app-detail">
                        <span class="app-detail-label">Full Name</span>
                        <strong>{{ $application->full_name }}</strong>
                    </div>

                    <div class="app-detail">
                        <span class="app-detail-label">Email</span>
                        <strong>{{ $application->email }}</strong>
                    </div>

                    <div class="app-detail">
                        <span class="app-detail-label">Mobile Number</span>
                        <strong>{{ $application->mobile_number }}</strong>
                    </div>

                    <div class="app-detail">
                        <span class="app-detail-label">Current City</span>
                        <strong>{{ $application->current_city }}</strong>
                    </div>

                    <div class="app-detail">
                        <span class="app-detail-label">Total Experience</span>
                        <strong>{{ $application->total_experience }}</strong>
                    </div>

                    <div class="app-detail">
                        <span class="app-detail-label">Highest Qualification</span>
                        <strong>{{ $application->highest_qualification ?: 'Not provided' }}</strong>
                    </div>
                </div>
            </div>

            <div class="app-card">
                <div class="app-card-head">
                    <div>
                        <div class="app-section-label">JOB INFORMATION</div>
                        <h2>Applied Position</h2>
                        <p>Details of the job opening associated with this application.</p>
                    </div>
                </div>

                <div class="app-detail-grid">
                    @if($application->jobOpening)
                        <div class="app-detail">
                            <span class="app-detail-label">Job Title</span>
                            <strong>{{ $application->jobOpening->title }}</strong>
                        </div>

                        <div class="app-detail">
                            <span class="app-detail-label">Department</span>
                            <strong>{{ $application->jobOpening->department }}</strong>
                        </div>

                        <div class="app-detail">
                            <span class="app-detail-label">Employment Type</span>
                            <strong>{{ $application->jobOpening->employment_type }}</strong>
                        </div>

                        <div class="app-detail">
                            <span class="app-detail-label">Location</span>
                            <strong>{{ $application->jobOpening->location }}</strong>
                        </div>
                    @else
                        <div class="app-detail full">
                            <strong>Associated job opening no longer exists.</strong>
                        </div>
                    @endif
                </div>
            </div>

            <div class="app-card">
                <div class="app-card-head">
                    <div>
                        <div class="app-section-label">CANDIDATE NOTE</div>
                        <h2>Brief Note</h2>
                    </div>
                </div>

                <div class="app-card-body">
                    @if($application->brief_note)
                        <div class="app-note">{{ $application->brief_note }}</div>
                    @else
                        <div class="app-subtext">No note provided.</div>
                    @endif
                </div>
            </div>

        </div>

        <div>

            <div class="app-card">
                <div class="app-card-head">
                    <div>
                        <div class="app-section-label">APPLICATION</div>
                        <h2>Status</h2>
                    </div>
                </div>

                <div class="app-card-body" style="text-align:center;">
                    @if($application->status === 'new')
                        <span class="app-status app-status-new app-status-large">New</span>
                    @elseif($application->status === 'reviewed')
                        <span class="app-status app-status-reviewed app-status-large">Reviewed</span>
                    @elseif($application->status === 'shortlisted')
                        <span class="app-status app-status-shortlisted app-status-large">Shortlisted</span>
                    @elseif($application->status === 'rejected')
                        <span class="app-status app-status-rejected app-status-large">Rejected</span>
                    @endif
                </div>
            </div>

            <div class="app-card">
                <div class="app-card-head">
                    <div>
                        <div class="app-section-label">DOCUMENT</div>
                        <h2>Resume</h2>
                    </div>
                </div>

                <div class="app-card-body">
                    @if($application->resume_path)
                        <a href="{{ Storage::url($application->resume_path) }}" target="_blank" class="app-primary-btn" style="width:100%;">
                            View Resume
                        </a>
                    @else
                        <div class="app-subtext" style="text-align:center;">Resume not available.</div>
                    @endif
                </div>
            </div>

            <div class="app-card">
                <div class="app-card-head">
                    <div>
                        <div class="app-section-label">APPLICATION META</div>
                        <h2>Record Information</h2>
                    </div>
                </div>

                <div class="app-card-body app-meta-list">
                    <div class="app-meta-item">
                        <span class="app-meta-label">Application ID</span>
                        <span class="app-meta-value">#{{ $application->id }}</span>
                    </div>

                    <div class="app-meta-item">
                        <span class="app-meta-label">Applied On</span>
                        <span class="app-meta-value">{{ $application->created_at->format('d M Y, h:i A') }}</span>
                    </div>

                    <div class="app-meta-item">
                        <span class="app-meta-label">Last Updated</span>
                        <span class="app-meta-value">{{ $application->updated_at->format('d M Y, h:i A') }}</span>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="app-card app-delete-card" style="margin-top:14px;">
        <div class="app-card-body">
            <div>
                <h3>Delete Application</h3>
                <p>This action cannot be undone.</p>
            </div>

            <form action="{{ route('admin.applications.destroy', $application) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this application?');" style="margin:0;">
                @csrf
                @method('DELETE')
                <button type="submit" class="app-danger-btn">
                    Delete Application
                </button>
            </form>
        </div>
    </div>

</div>
@endsection
