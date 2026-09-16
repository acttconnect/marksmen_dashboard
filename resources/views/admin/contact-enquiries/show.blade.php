@extends('admin.layouts.app')

@section('title', 'View Contact Enquiry')

@section('content')

<div class="ce-page">

    <div class="ce-page-header">

        <div>
            <div class="ce-eyebrow">CONTACT MANAGEMENT</div>
            <h1>Contact Enquiry Details</h1>
            <p>View complete contact enquiry information.</p>
        </div>

        <div class="ce-header-actions">

            <a
                href="{{ route('admin.contact-enquiries.index') }}"
                class="ce-btn ce-btn-light"
            >
                Back
            </a>

            <a
                href="{{ route('admin.contact-enquiries.edit', $contactEnquiry) }}"
                class="ce-btn ce-btn-primary"
            >
                Edit
            </a>

        </div>

    </div>


    <div class="ce-detail-layout">

        <div class="ce-detail-main">

            {{-- Customer Information --}}
            <div class="ce-card">

                <div class="ce-card-header">
                    <div>
                        <h2>Customer Information</h2>
                        <p>Customer contact and location details.</p>
                    </div>
                </div>

                <div class="ce-card-body">

                    <div class="ce-detail-grid">

                        <div class="ce-detail-item">
                            <span>Name</span>
                            <strong>{{ $contactEnquiry->name }}</strong>
                        </div>

                        <div class="ce-detail-item">
                            <span>Mobile Number</span>
                            <strong>
                                <a
                                    href="tel:{{ $contactEnquiry->mobile_number }}"
                                    class="ce-link"
                                >
                                    {{ $contactEnquiry->mobile_number }}
                                </a>
                            </strong>
                        </div>

                        <div class="ce-detail-item">
                            <span>Email</span>
                            <strong>
                                @if($contactEnquiry->email)
                                    <a
                                        href="mailto:{{ $contactEnquiry->email }}"
                                        class="ce-link"
                                    >
                                        {{ $contactEnquiry->email }}
                                    </a>
                                @else
                                    <em>Not provided</em>
                                @endif
                            </strong>
                        </div>

                        <div class="ce-detail-item">
                            <span>Location</span>
                            <strong>{{ $contactEnquiry->location }}</strong>
                        </div>

                    </div>

                </div>

            </div>


            {{-- Enquiry Information --}}
            <div class="ce-card">

                <div class="ce-card-header">
                    <div>
                        <h2>Enquiry Information</h2>
                        <p>Product enquiry and customer message.</p>
                    </div>
                </div>

                <div class="ce-card-body">

                    <div class="ce-detail-block">
                        <span>Product Enquiry</span>
                        <strong>{{ $contactEnquiry->product_enquiry }}</strong>
                    </div>

                    <div class="ce-detail-block">
                        <span>Message</span>

                        <div class="ce-message-box">

                            @if($contactEnquiry->message)
                                {!! nl2br(e($contactEnquiry->message)) !!}
                            @else
                                <em>No message provided.</em>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>


        <div class="ce-detail-sidebar">

            {{-- Meta --}}
            <div class="ce-card">

                <div class="ce-card-header">
                    <div>
                        <h2>Enquiry Information</h2>
                        <p>Record information.</p>
                    </div>
                </div>

                <div class="ce-card-body">

                    <div class="ce-meta-id">
                        <span>Enquiry ID</span>
                        <strong>#{{ $contactEnquiry->id }}</strong>
                    </div>

                    <div class="ce-meta-list">

                        <div>
                            <span>Created At</span>
                            <strong>
                                {{ $contactEnquiry->created_at->format('d M Y, h:i A') }}
                            </strong>
                        </div>

                        <div>
                            <span>Last Updated</span>
                            <strong>
                                {{ $contactEnquiry->updated_at->format('d M Y, h:i A') }}
                            </strong>
                        </div>

                    </div>

                </div>

            </div>


            {{-- Delete --}}
            <div class="ce-card ce-danger-card">

                <div class="ce-card-body">

                    <h2>Danger Zone</h2>

                    <p>
                        Deleting this enquiry cannot be undone.
                    </p>

                    <form
                        action="{{ route('admin.contact-enquiries.destroy', $contactEnquiry) }}"
                        method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this contact enquiry?');"
                    >
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="ce-danger-btn">
                            Delete Enquiry
                        </button>
                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection
