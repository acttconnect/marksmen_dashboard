@extends('user.layouts.app')

@section('title', 'User Registration')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-7 col-lg-6">

        <div class="card user-card shadow-sm">

            <div class="card-body p-4 p-md-5">

                <div class="text-center mb-4">

                    <div class="mb-3">

                        <i
                            class="bi bi-person-plus-fill gold"
                            style="font-size: 50px;"
                        ></i>

                    </div>

                    <h3 class="fw-bold">
                        Create Account
                    </h3>

                    <p class="text-muted mb-0">
                        Register your Marksmen user account
                    </p>

                </div>


                @if($errors->any())

                    <div class="alert alert-danger">

                        <strong>
                            Please fix the following:
                        </strong>

                        <ul class="mb-0 mt-2">

                            @foreach($errors->all() as $error)

                                <li>
                                    {{ $error }}
                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                <form
                    method="POST"
                    action="{{ route('user.register.submit') }}"
                >

                    @csrf


                    {{-- Name --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Full Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror"
                            placeholder="Enter your full name"
                            required
                        >

                        @error('name')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Email --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Email Address
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="Enter your email"
                            required
                        >

                        @error('email')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Mobile --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Mobile Number
                        </label>

                        <input
                            type="text"
                            name="mobile"
                            value="{{ old('mobile') }}"
                            class="form-control @error('mobile') is-invalid @enderror"
                            placeholder="Enter mobile number"
                            required
                        >

                        @error('mobile')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Password --}}
                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Minimum 8 characters"
                            required
                        >

                        @error('password')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- Confirm Password --}}
                    <div class="mb-4">

                        <label class="form-label fw-semibold">
                            Confirm Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            placeholder="Confirm password"
                            required
                        >

                    </div>


                    <button
                        type="submit"
                        class="btn btn-dark w-100 py-2"
                    >
                        <i class="bi bi-person-plus me-1"></i>
                        Create Account
                    </button>

                </form>


                <div class="text-center mt-4">

                    <span class="text-muted">
                        Already have an account?
                    </span>

                    <a
                        href="{{ route('user.login') }}"
                        class="text-decoration-none fw-semibold"
                    >
                        Login
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection