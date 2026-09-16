@extends('user.layouts.app')

@section('title', 'Contact / Callback')

@section('content')

<div class="mb-4">

    <h3 class="fw-bold">
        Contact / Callback Request
    </h3>

    <p class="text-muted">
        Submit your details and our team can contact you.
    </p>

</div>


<div class="card">

    <div class="card-body p-4">

        <form
            action="{{ route('user.contact.submit') }}"
            method="POST"
        >

            @csrf

            <div class="row g-3">

                <div class="col-md-6">

                    <label class="form-label">
                        Name *
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name', auth()->user()->name) }}"
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
                        Location *
                    </label>

                    <input
                        type="text"
                        name="location"
                        value="{{ old('location') }}"
                        class="form-control"
                        required
                    >

                </div>


                <div class="col-md-6">

                    <label class="form-label">
                        Email Address
                    </label>

                    <input
                        type="email"
                        name="email"
                        value="{{ old('email', auth()->user()->email) }}"
                        class="form-control"
                    >

                </div>


                <div class="col-12">

                    <label class="form-label">
                        Product Enquiry *
                    </label>

                    <input
                        type="text"
                        name="product_enquiry"
                        value="{{ old('product_enquiry') }}"
                        class="form-control"
                        required
                    >

                </div>


                <div class="col-12">

                    <label class="form-label">
                        Message / Requirements
                    </label>

                    <textarea
                        name="message"
                        rows="5"
                        class="form-control"
                    >{{ old('message') }}</textarea>

                </div>


                <div class="col-12">

                    <button
                        type="submit"
                        class="btn btn-gold"
                    >

                        Submit Request

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection