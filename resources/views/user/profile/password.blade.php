@extends('user.layouts.app')

@section('title', 'Change Password')

@section('content')

<div class="mb-4">

    <h3 class="fw-bold">
        Change Password
    </h3>

    <p class="text-muted">
        Update your account password securely.
    </p>

</div>


<div class="card">

    <div class="card-body p-4">

        <form
            method="POST"
            action="{{ route('user.change-password.update') }}"
        >

            @csrf
            @method('PUT')

            <div class="mb-3">

                <label class="form-label">
                    Current Password
                </label>

                <input
                    type="password"
                    name="current_password"
                    class="form-control"
                    required
                >

            </div>


            <div class="mb-3">

                <label class="form-label">
                    New Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    required
                >

                <small class="text-muted">
                    Minimum 8 characters.
                </small>

            </div>


            <div class="mb-4">

                <label class="form-label">
                    Confirm New Password
                </label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    required
                >

            </div>


            <button
                type="submit"
                class="btn btn-gold"
            >

                Change Password

            </button>

        </form>

    </div>

</div>

@endsection