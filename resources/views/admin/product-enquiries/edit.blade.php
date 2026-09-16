@extends('admin.layouts.app')

@section('title', 'Edit Product Enquiry')

@section('content')

<div class="mk-page mk-enquiry-page">

    {{-- PAGE HEADER --}}
    <div class="mk-page-header">
        <div>
            <div class="mk-eyebrow">ENQUIRY MANAGEMENT</div>

            <h1>Edit Product Enquiry</h1>

            <p>Update customer enquiry information and status.</p>
        </div>

        <a
            href="{{ route('admin.product-enquiries.index') }}"
            class="mk-secondary-btn"
        >
            Back to Enquiries
        </a>
    </div>


    {{-- VALIDATION ERRORS --}}
    @if($errors->any())

        <div class="mk-alert mk-alert-danger">

            <div>
                <strong>Please fix the following errors:</strong>

                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>

        </div>

    @endif


    {{-- MAIN CARD --}}
    <div class="mk-card">

        <div class="mk-card-head">
            <div>
                <h2>Enquiry Information</h2>

                <p>
                    Update the details received from the customer.
                </p>
            </div>
        </div>


        <div class="mk-card-body">

            <form
                action="{{ route('admin.product-enquiries.update', $productEnquiry) }}"
                method="POST"
            >

                @csrf
                @method('PUT')


                {{-- CUSTOMER DETAILS --}}
                <div class="mk-section">

                    <div class="mk-section-title">
                        Customer Details
                    </div>


                    <div class="mk-form-grid">

                        {{-- NAME --}}
                        <div class="mk-field">

                            <label for="name">
                                Name <span>*</span>
                            </label>

                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name', $productEnquiry->name) }}"
                                class="mk-form-input @error('name') mk-input-error @enderror"
                                placeholder="Enter customer name"
                            >

                            @error('name')
                                <div class="mk-field-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- MOBILE --}}
                        <div class="mk-field">

                            <label for="mobile_number">
                                Mobile Number <span>*</span>
                            </label>

                            <input
                                id="mobile_number"
                                type="text"
                                name="mobile_number"
                                value="{{ old('mobile_number', $productEnquiry->mobile_number) }}"
                                class="mk-form-input @error('mobile_number') mk-input-error @enderror"
                                placeholder="Enter mobile number"
                            >

                            @error('mobile_number')
                                <div class="mk-field-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- EMAIL --}}
                        <div class="mk-field">

                            <label for="email">
                                Email
                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email', $productEnquiry->email) }}"
                                class="mk-form-input @error('email') mk-input-error @enderror"
                                placeholder="Enter email address"
                            >

                            @error('email')
                                <div class="mk-field-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- PROJECT LOCATION --}}
                        <div class="mk-field">

                            <label for="project_location">
                                Project Location <span>*</span>
                            </label>

                            <input
                                id="project_location"
                                type="text"
                                name="project_location"
                                value="{{ old('project_location', $productEnquiry->project_location) }}"
                                class="mk-form-input @error('project_location') mk-input-error @enderror"
                                placeholder="Enter project location"
                            >

                            @error('project_location')
                                <div class="mk-field-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- ENQUIRY DETAILS --}}
                <div class="mk-section">

                    <div class="mk-section-title">
                        Enquiry Details
                    </div>


                    <div class="mk-form-grid">

                        {{-- PRODUCT --}}
                        <div class="mk-field">

                            <label for="product_portfolio">
                                Product / Service Portfolio <span>*</span>
                            </label>

                            <input
                                id="product_portfolio"
                                type="text"
                                name="product_portfolio"
                                value="{{ old('product_portfolio', $productEnquiry->product_portfolio) }}"
                                class="mk-form-input @error('product_portfolio') mk-input-error @enderror"
                                placeholder="Enter product or service"
                            >

                            @error('product_portfolio')
                                <div class="mk-field-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- STATUS --}}
                        <div class="mk-field">

                            <label for="status">
                                Status <span>*</span>
                            </label>

                            <select
                                id="status"
                                name="status"
                                class="mk-form-input @error('status') mk-input-error @enderror"
                            >

                                <option
                                    value="new"
                                    {{ old('status', $productEnquiry->status) === 'new' ? 'selected' : '' }}
                                >
                                    New
                                </option>

                                <option
                                    value="contacted"
                                    {{ old('status', $productEnquiry->status) === 'contacted' ? 'selected' : '' }}
                                >
                                    Contacted
                                </option>

                                <option
                                    value="closed"
                                    {{ old('status', $productEnquiry->status) === 'closed' ? 'selected' : '' }}
                                >
                                    Closed
                                </option>

                            </select>

                            @error('status')
                                <div class="mk-field-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- REQUIREMENTS --}}
                        <div class="mk-field mk-field-full">

                            <label for="requirements">
                                Requirements / Scope
                            </label>

                            <textarea
                                id="requirements"
                                name="requirements"
                                rows="7"
                                class="mk-form-input @error('requirements') mk-input-error @enderror"
                                placeholder="Enter customer requirements or project scope..."
                            >{{ old('requirements', $productEnquiry->requirements) }}</textarea>

                            @error('requirements')
                                <div class="mk-field-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- FOOTER ACTIONS --}}
                <div class="mk-form-footer">

                    <a
                        href="{{ route('admin.product-enquiries.index') }}"
                        class="mk-secondary-btn"
                    >
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="mk-primary-btn"
                    >
                        Update Enquiry
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection