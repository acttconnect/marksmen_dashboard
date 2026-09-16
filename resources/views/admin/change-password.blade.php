@extends('layouts.admin')

@section('title', 'Change Password')
@section('page-title', 'Change Password')

@section('content')

<div class="mk-page">

    {{-- PAGE HEADER --}}
    <div class="mk-page-header">
        <div>
            <div class="mk-eyebrow">ACCOUNT SETTINGS</div>

            <h1>Change Password</h1>

            <p>Update your account password securely.</p>
        </div>
    </div>


    {{-- PASSWORD CARD --}}
    <div class="mk-card" style="max-width: 600px;">

        <div class="mk-card-head">
            <div>
                <h2>Change Password</h2>

                <p>
                    Enter your current password and choose a new password.
                </p>
            </div>
        </div>


        <div class="mk-card-body">

            <form
                method="POST"
                action="{{ route('admin.change-password.update') }}"
            >

                @csrf
                @method('PUT')


                {{-- CURRENT PASSWORD --}}
                <div class="mk-field">

                    <label for="current_password">
                        Current Password
                    </label>

                    <input
                        id="current_password"
                        type="password"
                        name="current_password"
                        class="mk-form-input @error('current_password') mk-input-error @enderror"
                        placeholder="Enter current password"
                        required
                    >

                    @error('current_password')
                        <div class="mk-field-error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- NEW PASSWORD --}}
                <div class="mk-field">

                    <label for="password">
                        New Password
                    </label>

                    <input
                        id="password"
                        type="password"
                        name="password"
                        class="mk-form-input @error('password') mk-input-error @enderror"
                        placeholder="Enter new password"
                        required
                    >

                    @error('password')
                        <div class="mk-field-error">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- CONFIRM PASSWORD --}}
                <div class="mk-field">

                    <label for="password_confirmation">
                        Confirm New Password
                    </label>

                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        class="mk-form-input"
                        placeholder="Confirm new password"
                        required
                    >

                </div>


                {{-- ACTION --}}
                <div class="mk-form-footer">

                    <button
                        type="submit"
                        class="mk-primary-btn"
                    >
                        Change Password
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection