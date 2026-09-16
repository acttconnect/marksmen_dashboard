@extends('admin.layouts.app')

@section('title', 'Change Password')

@section('content')

<div class="container-fluid">

    {{-- Header --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="fw-bold mb-1">
                <i class="bi bi-shield-lock me-2"></i>
                Change Password
            </h3>

            <p class="text-muted mb-0">
                Update your admin account password.
            </p>
        </div>

        <a href="{{ route('admin.dashboard') }}"
           class="btn btn-light border">

            <i class="bi bi-arrow-left me-1"></i>
            Back to Dashboard

        </a>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

            <button type="button"
                    class="btn-close"
                    data-bs-dismiss="alert">
            </button>

        </div>

    @endif


    {{-- Validation Errors --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <div class="fw-bold mb-2">
                Please fix the following errors:
            </div>

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="row">

        <div class="col-lg-7 col-xl-6">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">

                    <h5 class="fw-bold mb-0">

                        <i class="bi bi-key me-2"></i>

                        Update Password

                    </h5>

                </div>


                <div class="card-body p-4">

                    <form
                        action="{{ route('admin.change-password.update') }}"
                        method="POST"
                    >

                        @csrf
                        @method('PUT')


                        {{-- Current Password --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Current Password
                            </label>

                            <input
                                type="password"
                                name="current_password"
                                class="form-control @error('current_password') is-invalid @enderror"
                                placeholder="Enter current password"
                                required
                                autocomplete="current-password"
                            >

                            @error('current_password')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- New Password --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                New Password
                            </label>

                            <input
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter new password"
                                required
                                minlength="8"
                                autocomplete="new-password"
                            >

                            @error('password')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                            <small class="text-muted">
                                Password must be at least 8 characters.
                            </small>

                        </div>


                        {{-- Confirm Password --}}
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Confirm New Password
                            </label>

                            <input
                                type="password"
                                name="password_confirmation"
                                class="form-control"
                                placeholder="Confirm new password"
                                required
                                minlength="8"
                                autocomplete="new-password"
                            >

                        </div>


                        {{-- Buttons --}}
                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >

                                <i class="bi bi-check-circle me-1"></i>

                                Change Password

                            </button>


                            <a
                                href="{{ route('admin.dashboard') }}"
                                class="btn btn-light border"
                            >

                                Cancel

                            </a>

                        </div>

                    </form>

                </div>

            </div>

        </div>


        {{-- Security Information --}}
        <div class="col-lg-5 col-xl-4">

            <div class="card border-0 shadow-sm">

                <div class="card-header bg-white py-3">

                    <h5 class="fw-bold mb-0">

                        <i class="bi bi-info-circle me-2"></i>

                        Password Security

                    </h5>

                </div>

                <div class="card-body">

                    <p class="text-muted">
                        For better account security, use a strong
                        password that you don't use on other websites.
                    </p>

                    <ul class="text-muted mb-0">

                        <li class="mb-2">
                            Minimum 8 characters
                        </li>

                        <li class="mb-2">
                            Use uppercase and lowercase letters
                        </li>

                        <li class="mb-2">
                            Include numbers
                        </li>

                        <li class="mb-2">
                            Include special characters
                        </li>

                        <li>
                            Don't share your password with anyone
                        </li>

                    </ul>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection