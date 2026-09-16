@extends('user.layouts.app')

@section('title', $job->title)

@section('content')

<div class="card">

    <div class="card-body p-4">

        <div class="d-flex justify-content-between align-items-start">

            <div>

                <h2 class="fw-bold">
                    {{ $job->title }}
                </h2>

                <p class="text-muted">

                    {{ $job->department }}
                    •
                    {{ $job->location }}

                </p>

            </div>

            <span class="badge bg-success">
                Open
            </span>

        </div>

        <hr>

        <div class="row g-4 mb-4">

            <div class="col-md-3">

                <strong>Employment</strong>

                <p class="text-muted">
                    {{ $job->employment_type }}
                </p>

            </div>

            <div class="col-md-3">

                <strong>Experience</strong>

                <p class="text-muted">
                    {{ $job->experience }}
                </p>

            </div>

            <div class="col-md-3">

                <strong>Positions</strong>

                <p class="text-muted">
                    {{ $job->open_positions }}
                </p>

            </div>

            <div class="col-md-3">

                <strong>Deadline</strong>

                <p class="text-muted">

                    {{ $job->application_deadline
                        ? $job->application_deadline->format('d M Y')
                        : 'Open' }}

                </p>

            </div>

        </div>


        <h5 class="fw-bold">
            Job Description
        </h5>

        <div class="mb-4">
            {!! nl2br(e($job->job_description)) !!}
        </div>


        @if($job->skills)

            <h5 class="fw-bold">
                Skills
            </h5>

            <div class="mb-4">

                @foreach($job->skills as $skill)

                    <span class="badge bg-light text-dark border me-1 mb-1">
                        {{ $skill }}
                    </span>

                @endforeach

            </div>

        @endif


        @if($job->qualification)

            <h5 class="fw-bold">
                Qualification
            </h5>

            <p>
                {!! nl2br(e($job->qualification)) !!}
            </p>

        @endif


        @if($job->responsibilities)

            <h5 class="fw-bold mt-4">
                Responsibilities
            </h5>

            <p>
                {!! nl2br(e($job->responsibilities)) !!}
            </p>

        @endif


        @if($job->requirements)

            <h5 class="fw-bold mt-4">
                Requirements
            </h5>

            <p>
                {!! nl2br(e($job->requirements)) !!}
            </p>

        @endif


        <div class="mt-4">

            <a
    href="{{ route('user.jobs.apply', $job) }}"
    class="btn btn-gold"
>
    <i class="bi bi-send me-1"></i>
    Apply for this Job
</a>

        </div>

    </div>

</div>

@endsection