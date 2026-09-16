@extends('user.layouts.app')

@section('title', 'User Login')

@section('content')

<div class="row justify-content-center">

    <div class="col-md-6 col-lg-5">

        <div class="card user-card shadow-sm">

            <div class="card-body p-4 p-md-5">

                <div class="text-center mb-4">

                    <div class="mb-3">

                        <i
                            class="bi bi-person-circle gold"
                            style="font-size: 55px;"
                        ></i>

                    </div>

                    <h3 class="fw-bold">
                        User Login
                    </h3>

                    <p class="text-muted mb-0">
                        Sign in to your Marksmen account
                    </p>

                </div>


                @if($errors->any())

                    <div class="alert alert-danger">

                        @foreach($errors->all() as $error)

                            <div>
                                {{ $error }}
                            </div>

                        @endforeach

                    </div>

                @endif


                <form
                    method="POST"
                    action="{{ route('user.login.submit') }}"
                >

                    @csrf


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
                            autofocus
                        >

                        @error('email')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="mb-3">

                        <label class="form-label fw-semibold">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Enter your password"
                            required
                        >

                        @error('password')

                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    <div class="form-check mb-4">

                        <input
                            type="checkbox"
                            name="remember"
                            value="1"
                            class="form-check-input"
                            id="remember"
                        >

                        <label
                            class="form-check-label"
                            for="remember"
                        >
                            Remember me
                        </label>

                    </div>


                    <button
                        type="submit"
                        class="btn btn-dark w-100 py-2"
                    >
                        <i class="bi bi-box-arrow-in-right me-1"></i>
                        Login
                    </button>

                </form>


                <div class="text-center mt-4">

                    <span class="text-muted">
                        Don't have an account?
                    </span>

                    <a
                        href="{{ route('user.register') }}"
                        class="text-decoration-none fw-semibold"
                    >
                        Register
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection