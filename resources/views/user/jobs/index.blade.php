@extends('user.layouts.app')

@section('title', 'Job Openings')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h3 class="fw-bold mb-1">
            Job Openings
        </h3>

        <p class="text-muted mb-0">
            Explore current career opportunities.
        </p>
    </div>

</div>


<form method="GET" class="card p-3 mb-4">

    <div class="row g-2">

        <div class="col-md-10">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                class="form-control"
                placeholder="Search job title, department or location..."
            >

        </div>

        <div class="col-md-2">

            <button class="btn btn-gold w-100">

                <i class="bi bi-search"></i>
                Search

            </button>

        </div>

    </div>

</form>


<div class="row g-4">

    @forelse($jobs as $job)

        <div class="col-md-6">

            <div class="card h-100">

                <div class="card-body">

                    <span class="badge bg-success mb-3">
                        {{ ucfirst($job->employment_type) }}
                    </span>

                    <h5 class="fw-bold">
                        {{ $job->title }}
                    </h5>

                    <p class="text-muted mb-2">

                        <i class="bi bi-building"></i>

                        {{ $job->department }}

                    </p>

                    <p class="text-muted mb-2">

                        <i class="bi bi-geo-alt"></i>

                        {{ $job->location }}

                    </p>

                    <p class="text-muted">

                        <i class="bi bi-clock"></i>

                        {{ $job->experience }}

                    </p>

                    <a
                        href="{{ route('user.jobs.show', $job) }}"
                        class="btn btn-outline-dark">

                        View Job

                    </a>

                </div>

            </div>

        </div>

    @empty

        <div class="col-12">

            <div class="card">

                <div class="card-body text-center p-5">

                    <i class="bi bi-briefcase fs-1 text-muted"></i>

                    <h5 class="mt-3">
                        No jobs available
                    </h5>

                    <p class="text-muted mb-0">
                        Please check again later.
                    </p>

                </div>

            </div>

        </div>

    @endforelse

</div>


<div class="mt-4">

    {{ $jobs->links() }}

</div>

@endsection