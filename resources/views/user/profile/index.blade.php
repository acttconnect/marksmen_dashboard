@extends('user.layouts.app')

@section('title', 'My Profile')

@section('content')

<div class="mb-4">

    <h3 class="fw-bold">
        My Profile
    </h3>

    <p class="text-muted">
        Manage your account information.
    </p>

</div>


<div class="card">

    <div class="card-body p-4">

        <form
            method="POST"
            action="{{ route('user.profile.update') }}"
        >

            @csrf
            @method('PUT')

            <div class="row g-3">

                <div class="col-md-6">

                    <label class="form-label">
                        Full Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', $user->name) }}"
                        class="form-control"
                        required
                    >

                </div>


                <div class="col-md-6">

                    <label class="form-label">
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', $user->email) }}"
                        class="form-control"
                        required
                    >

                </div>


                <div class="col-md-6">

                    <label class="form-label">
                        Mobile
                    </label>

                    <input
                        type="text"
                        name="mobile"
                        value="{{ old('mobile', $user->mobile) }}"
                        class="form-control"
                        required
                    >

                </div>


                <div class="col-md-6">

                    <label class="form-label">
                        Account Type
                    </label>

                    <input
                        type="text"
                        value="User"
                        class="form-control"
                        disabled
                    >

                </div>


                <div class="col-12">

                    <button
                        type="submit"
                        class="btn btn-gold"
                    >

                        Update Profile

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection