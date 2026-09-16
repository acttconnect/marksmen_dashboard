@extends('admin.layouts.app')

@section('title', 'Edit Application')

@section('content')
<div class="app-page">

    <div class="app-header">
        <div>
            <div class="app-eyebrow">RECRUITMENT MANAGEMENT</div>
            <h1>Edit Job Application</h1>
            <p>Update candidate information and application status.</p>
        </div>

        <a href="{{ route('admin.applications.index') }}" class="app-secondary-btn">
            Back to Applications
        </a>
    </div>

    @if($errors->any())
        <div class="app-alert app-alert-danger">
            <strong>Please fix the following errors:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.applications.update', $application) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="app-grid">

            <div>
                <div class="app-card">
                    <div class="app-card-head">
                        <div>
                            <div class="app-section-label">CANDIDATE INFORMATION</div>
                            <h2>Candidate Details</h2>
                            <p>Update the applicant's personal and professional information.</p>
                        </div>
                    </div>

                    <div class="app-card-body">
                        <div class="app-form-grid">

                            <div class="app-form-group">
                                <label>Full Name <span class="app-required">*</span></label>
                                <input type="text" name="full_name" class="app-input @error('full_name') app-invalid @enderror" value="{{ old('full_name', $application->full_name) }}">
                                @error('full_name') <p class="app-error">{{ $message }}</p> @enderror
                            </div>

                            <div class="app-form-group">
                                <label>Mobile Number <span class="app-required">*</span></label>
                                <input type="text" name="mobile_number" class="app-input @error('mobile_number') app-invalid @enderror" value="{{ old('mobile_number', $application->mobile_number) }}">
                                @error('mobile_number') <p class="app-error">{{ $message }}</p> @enderror
                            </div>

                            <div class="app-form-group">
                                <label>Email <span class="app-required">*</span></label>
                                <input type="email" name="email" class="app-input @error('email') app-invalid @enderror" value="{{ old('email', $application->email) }}">
                                @error('email') <p class="app-error">{{ $message }}</p> @enderror
                            </div>

                            <div class="app-form-group">
                                <label>Current City <span class="app-required">*</span></label>
                                <input type="text" name="current_city" class="app-input @error('current_city') app-invalid @enderror" value="{{ old('current_city', $application->current_city) }}">
                                @error('current_city') <p class="app-error">{{ $message }}</p> @enderror
                            </div>

                            <div class="app-form-group">
                                <label>Total Experience <span class="app-required">*</span></label>
                                <input type="text" name="total_experience" class="app-input @error('total_experience') app-invalid @enderror" value="{{ old('total_experience', $application->total_experience) }}">
                                @error('total_experience') <p class="app-error">{{ $message }}</p> @enderror
                            </div>

                            <div class="app-form-group">
                                <label>Highest Qualification</label>
                                <input type="text" name="highest_qualification" class="app-input" value="{{ old('highest_qualification', $application->highest_qualification) }}">
                            </div>

                            <div class="app-form-group full">
                                <label>Job Opening <span class="app-required">*</span></label>
                                <select name="job_opening_id" class="app-select @error('job_opening_id') app-invalid @enderror">
                                    @foreach($jobs as $job)
                                        <option value="{{ $job->id }}" @selected(old('job_opening_id', $application->job_opening_id) == $job->id)>
                                            {{ $job->title }} - {{ $job->department }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('job_opening_id') <p class="app-error">{{ $message }}</p> @enderror
                            </div>

                            <div class="app-form-group full">
                                <label>Brief Note</label>
                                <textarea name="brief_note" rows="5" class="app-textarea">{{ old('brief_note', $application->brief_note) }}</textarea>
                            </div>

                        </div>
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

                    <div class="app-status-box">
                        <div class="app-field">
                            <label>Status</label>
                            <select name="status" class="app-select @error('status') app-invalid @enderror">
                                <option value="new" @selected(old('status', $application->status) === 'new')>New</option>
                                <option value="reviewed" @selected(old('status', $application->status) === 'reviewed')>Reviewed</option>
                                <option value="shortlisted" @selected(old('status', $application->status) === 'shortlisted')>Shortlisted</option>
                                <option value="rejected" @selected(old('status', $application->status) === 'rejected')>Rejected</option>
                            </select>
                            @error('status') <p class="app-error">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="app-card">
                    <div class="app-card-head">
                        <div>
                            <div class="app-section-label">DOCUMENT</div>
                            <h2>Resume</h2>
                        </div>
                    </div>

                    <div class="app-status-box">
                        @if($application->resume_path)
                            <a href="{{ Storage::url($application->resume_path) }}" target="_blank" class="app-current-file">
                                View Current Resume
                            </a>
                        @endif

                        <div class="app-field">
                            <label>Replace Resume</label>
                            <input type="file" name="resume" class="app-file @error('resume') app-invalid @enderror" accept=".pdf,.doc,.docx">
                            <p class="app-help">PDF, DOC or DOCX. Maximum 5 MB.</p>
                            @error('resume') <p class="app-error">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </div>

                <div class="app-card">
                    <div class="app-save-box">
                        <button type="submit" class="app-primary-btn" style="width:100%;">
                            Update Application
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </form>

</div>
@endsection
