@extends('user.layouts.app')

@section('title', 'Product Enquiry')

@section('content')

<div class="mb-4">

    <h3 class="fw-bold">
        Product / Requirement Enquiry
    </h3>

    <p class="text-muted">
        Submit your product or service requirement.
    </p>

</div>


<div class="card">

    <div class="card-body p-4">

        <form
            action="{{ route('user.product-enquiry.submit') }}"
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
                        Project Location *
                    </label>

                    <input
                        type="text"
                        name="project_location"
                        value="{{ old('project_location') }}"
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
                        Product / Service Portfolio *
                    </label>

                    <input
                        type="text"
                        name="product_portfolio"
                        value="{{ old('product_portfolio') }}"
                        class="form-control"
                        required
                    >

                </div>


                <div class="col-12">

                    <label class="form-label">
                        Scope / Requirements
                    </label>

                    <textarea
                        name="requirements"
                        rows="5"
                        class="form-control"
                    >{{ old('requirements') }}</textarea>

                </div>


                <div class="col-12">

                    <button
                        type="submit"
                        class="btn btn-gold"
                    >

                        Submit Enquiry

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>

@endsection