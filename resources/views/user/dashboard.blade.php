@extends('user.layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="mb-4">

    <h3 class="fw-bold mb-1">
        Welcome, {{ $user->name }}
    </h3>

    <p class="text-muted mb-0">
        Manage your applications, enquiries and account.
    </p>

</div>


<div class="row g-4 mb-4">

    <div class="col-md-4">

        <div class="card stat-card">

            <div class="d-flex justify-content-between">

                <div>
                    <small class="text-muted">
                        Open Jobs
                    </small>

                    <h2 class="fw-bold mt-2">
                        {{ $availableJobs }}
                    </h2>
                </div>

                <div class="stat-icon">
                    <i class="bi bi-briefcase"></i>
                </div>

            </div>

        </div>

    </div>


    <div class="col-md-4">

        <div class="card stat-card">

            <div class="d-flex justify-content-between">

                <div>
                    <small class="text-muted">
                        My Applications
                    </small>

                    <h2 class="fw-bold mt-2">
                        {{ $applicationCount }}
                    </h2>
                </div>

                <div class="stat-icon">
                    <i class="bi bi-file-earmark-person"></i>
                </div>

            </div>

        </div>

    </div>


    <div class="col-md-4">

        <div class="card stat-card">

            <div class="d-flex justify-content-between">

                <div>
                    <small class="text-muted">
                        My Enquiries
                    </small>

                    <h2 class="fw-bold mt-2">
                        {{ $enquiryCount }}
                    </h2>
                </div>

                <div class="stat-icon">
                    <i class="bi bi-chat-left-text"></i>
                </div>

            </div>

        </div>

    </div>

</div>


<div class="row g-4">

    <div class="col-lg-8">

        <div class="card">

            <div class="card-header bg-white p-3">

                <h5 class="mb-0">
                    Recent Applications
                </h5>

            </div>

            <div class="card-body p-0">

                @if($recentApplications->count())

                    <div class="table-responsive">

                        <table class="table mb-0 align-middle">

                            <thead>
                                <tr>
                                    <th class="px-3">
                                        Job
                                    </th>

                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Applied
                                    </th>
                                </tr>
                            </thead>

                            <tbody>

                            @foreach($recentApplications as $application)

                                <tr>

                                    <td class="px-3">

                                        {{ $application->jobOpening?->title ?? 'N/A' }}

                                    </td>

                                    <td>

                                        <span class="badge bg-secondary">

                                            {{ ucfirst($application->status) }}

                                        </span>

                                    </td>

                                    <td>

                                        {{ $application->created_at->format('d M Y') }}

                                    </td>

                                </tr>

                            @endforeach

                            </tbody>

                        </table>

                    </div>

                @else

                    <div class="text-center p-5">

                        <i class="bi bi-file-earmark fs-1 text-muted"></i>

                        <p class="text-muted mt-3">
                            No applications found.
                        </p>

                        <a href="{{ route('user.jobs.index') }}"
                           class="btn btn-gold">

                            Browse Jobs

                        </a>

                    </div>

                @endif

            </div>

        </div>

    </div>


    <div class="col-lg-4">

        <div class="card">

            <div class="card-body">

                <h5 class="fw-bold">
                    Account
                </h5>

                <hr>

                <p class="mb-2">
                    <strong>Name:</strong>
                    {{ $user->name }}
                </p>

                <p class="mb-2">
                    <strong>Email:</strong>
                    {{ $user->email }}
                </p>

                <p class="mb-3">
                    <strong>Mobile:</strong>
                    {{ $user->mobile }}
                </p>

                <a href="{{ route('user.profile') }}"
                   class="btn btn-outline-dark w-100">

                    Manage Profile

                </a>

            </div>

        </div>

    </div>

</div>

@endsection