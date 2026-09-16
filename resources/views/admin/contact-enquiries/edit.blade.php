@extends('admin.layouts.app')

@section('title', 'Edit Contact Enquiry')

@section('content')

<div class="mk-page mk-enquiry-page">

    {{-- PAGE HEADER --}}
    <div class="mk-page-header">
        <div>
            <div class="mk-eyebrow">CONTACT MANAGEMENT</div>

            <h1>Edit Contact Enquiry</h1>

            <p>Update customer contact and enquiry information.</p>
        </div>

        <a
            href="{{ route('admin.contact-enquiries.index') }}"
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


    {{-- FORM CARD --}}
    <div class="mk-card">

        <div class="mk-card-head">
            <div>
                <h2>Contact Enquiry Information</h2>

                <p>
                    Update the details received from the customer.
                </p>
            </div>
        </div>


        <div class="mk-card-body">

            <form
                action="{{ route('admin.contact-enquiries.update', $contactEnquiry) }}"
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
                                value="{{ old('name', $contactEnquiry->name) }}"
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
                                value="{{ old('mobile_number', $contactEnquiry->mobile_number) }}"
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
                                value="{{ old('email', $contactEnquiry->email) }}"
                                class="mk-form-input @error('email') mk-input-error @enderror"
                                placeholder="Enter email address"
                            >

                            @error('email')
                                <div class="mk-field-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- LOCATION --}}
                        <div class="mk-field">

                            <label for="location">
                                Location <span>*</span>
                            </label>

                            <input
                                id="location"
                                type="text"
                                name="location"
                                value="{{ old('location', $contactEnquiry->location) }}"
                                class="mk-form-input @error('location') mk-input-error @enderror"
                                placeholder="Enter location"
                            >

                            @error('location')
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

                        {{-- PRODUCT ENQUIRY --}}
                        <div class="mk-field mk-field-full">

                            <label for="product_enquiry">
                                Product Enquiry <span>*</span>
                            </label>

                            <input
                                id="product_enquiry"
                                type="text"
                                name="product_enquiry"
                                value="{{ old('product_enquiry', $contactEnquiry->product_enquiry) }}"
                                class="mk-form-input @error('product_enquiry') mk-input-error @enderror"
                                placeholder="Enter product enquiry"
                            >

                            @error('product_enquiry')
                                <div class="mk-field-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>


                        {{-- MESSAGE --}}
                        <div class="mk-field mk-field-full">

                            <label for="message">
                                Message
                            </label>

                            <textarea
                                id="message"
                                name="message"
                                rows="7"
                                class="mk-form-input @error('message') mk-input-error @enderror"
                                placeholder="Enter customer message..."
                            >{{ old('message', $contactEnquiry->message) }}</textarea>

                            @error('message')
                                <div class="mk-field-error">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                    </div>

                </div>


                {{-- FORM ACTIONS --}}
                <div class="mk-form-footer">

                    <a
                        href="{{ route('admin.contact-enquiries.index') }}"
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