@extends('user.layouts.app')

@section('title', 'My Applications')

@section('content')

<div class="mb-4">

    <h3 class="fw-bold">
        My Applications
    </h3>

    <p class="text-muted">
        Track your submitted job applications.
    </p>

</div>


<div class="card">

    <div class="card-body p-0">

        @if($applications->count())

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead>

                        <tr>

                            <th class="px-3">
                                Job
                            </th>

                            <th>
                                Location
                            </th>

                            <th>
                                Experience
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

                    @foreach($applications as $application)

                        <tr>

                            <td class="px-3">

                                <strong>
                                    {{ $application->jobOpening?->title ?? 'N/A' }}
                                </strong>

                                <br>

                                <small class="text-muted">
                                    {{ $application->jobOpening?->department }}
                                </small>

                            </td>


                            <td>

                                {{ $application->jobOpening?->location ?? 'N/A' }}

                            </td>


                            <td>

                                {{ $application->total_experience }}

                            </td>


                            <td>

                                @php

                                    $badge = match($application->status) {
                                        'new' => 'bg-primary',
                                        'reviewed' => 'bg-info',
                                        'shortlisted' => 'bg-success',
                                        'rejected' => 'bg-danger',
                                        default => 'bg-secondary',
                                    };

                                @endphp

                                <span class="badge {{ $badge }}">

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

                <i class="bi bi-file-earmark-person fs-1 text-muted"></i>

                <h5 class="mt-3">
                    No applications yet
                </h5>

                <p class="text-muted">
                    You have not applied for any job.
                </p>

                <a
                    href="{{ route('user.jobs.index') }}"
                    class="btn btn-gold"
                >
                    Browse Jobs
                </a>

            </div>

        @endif

    </div>

</div>


@if($applications->hasPages())

    <div class="mt-4">

        {{ $applications->links() }}

    </div>

@endif

@endsection