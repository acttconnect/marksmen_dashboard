@extends('user.layouts.app')

@section('title', 'Apply - ' . $job->title)

@section('content')

<div class="mb-4">

    <h3 class="fw-bold">
        Apply for {{ $job->title }}
    </h3>

    <p class="text-muted">
        {{ $job->department }} · {{ $job->location }}
    </p>

</div>

<div class="card">

    <div class="card-body p-4">

        <form
            action="{{ route('user.jobs.apply.store', $job) }}"
            method="POST"
            enctype="multipart/form-data"
        >

            @csrf

            <div class="row g-3">

                <div class="col-md-6">

                    <label class="form-label">
                        Full Name *
                    </label>

                    <input
                        type="text"
                        name="full_name"
                        value="{{ old('full_name', auth()->user()->name) }}"
                        class="form-control"
                        required
                    >

                </div>


                <div class="col-md-6">

                    <label class="form-label">
                        Mobile Number *
                    </label>

                    <input
                        type="text"
                        name="mobile_number"
                        value="{{ old('mobile_number', auth()->user()->mobile) }}"
                        class="form-control"
                        required
                    >

                </div>


                <div class="col-md-6">

                    <label class="form-label">
                        Email Address *
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', auth()->user()->email) }}"
                        class="form-control"
                        required
                    >

                </div>


                <div class="col-md-6">

                    <label class="form-label">
                        Current City *
                    </label>

                    <input
                        type="text"
                        name="current_city"
                        value="{{ old('current_city') }}"
                        class="form-control"
                        required
                    >

                </div>


                <div class="col-md-6">

                    <label class="form-label">
                        Total Experience *
                    </label>

                    <input
                        type="text"
                        name="total_experience"
                        value="{{ old('total_experience') }}"
                        class="form-control"
                        placeholder="Example: 2 Years"
                        required
                    >

                </div>


                <div class="col-md-6">

                    <label class="form-label">
                        Highest Qualification
                    </label>

                    <input
                        type="text"
                        name="highest_qualification"
                        value="{{ old('highest_qualification') }}"
                        class="form-control"
                        placeholder="Example: B.Tech"
                    >

                </div>


                <div class="col-12">

                    <label class="form-label">
                        Resume / CV *
                    </label>

                    <input
                        type="file"
                        name="resume"
                        class="form-control"
                        accept=".pdf,.doc,.docx"
                        required
                    >

                    <small class="text-muted">
                        PDF, DOC or DOCX. Maximum 5 MB.
                    </small>

                </div>


                <div class="col-12">

                    <label class="form-label">
                        Brief Note / Key Skills
                    </label>

                    <textarea
                        name="brief_note"
                        rows="5"
                        class="form-control"
                        placeholder="Tell us briefly about your skills..."
                    >{{ old('brief_note') }}</textarea>

                </div>


                <div class="col-12 mt-4">

                    <button
                        type="submit"
                        class="btn btn-gold px-4"
                    >

                        <i class="bi bi-send me-1"></i>

                        Submit Application

                    </button>

                    <a
                        href="{{ route('user.jobs.show', $job) }}"
                        class="btn btn-outline-secondary ms-2"
                    >
                        Cancel
                    </a>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection