@extends('admin.layouts.app')

@section('title', 'View Product Enquiry')

@section('content')
<div class="mk-page mk-enquiry-page">

    <div class="mk-page-header">
        <div>
            <div class="mk-eyebrow">ENQUIRY MANAGEMENT</div>
            <h1>Product Enquiry Details</h1>
            <p>View complete enquiry information.</p>
        </div>

        <div class="mk-header-actions">
            <a href="{{ route('admin.product-enquiries.index') }}" class="mk-secondary-btn">
                Back
            </a>
            <a href="{{ route('admin.product-enquiries.edit', $productEnquiry) }}" class="mk-primary-btn">
                Edit
            </a>
        </div>
    </div>

    <div class="mk-enquiry-detail-grid">

        <div class="mk-enquiry-main">

            <div class="mk-card">
                <div class="mk-card-head">
                    <div>
                        <h2>Customer Information</h2>
                        <p>Contact and project details.</p>
                    </div>
                </div>

                <div class="mk-card-body">
                    <div class="mk-detail-grid">
                        <div class="mk-detail-item">
                            <span>Name</span>
                            <strong>{{ $productEnquiry->name }}</strong>
                        </div>

                        <div class="mk-detail-item">
                            <span>Mobile Number</span>
                            <strong>
                                <a href="tel:{{ $productEnquiry->mobile_number }}" class="mk-table-link">
                                    {{ $productEnquiry->mobile_number }}
                                </a>
                            </strong>
                        </div>

                        <div class="mk-detail-item">
                            <span>Email</span>
                            <strong>
                                @if($productEnquiry->email)
                                    <a href="mailto:{{ $productEnquiry->email }}" class="mk-table-link">
                                        {{ $productEnquiry->email }}
                                    </a>
                                @else
                                    <em>Not provided</em>
                                @endif
                            </strong>
                        </div>

                        <div class="mk-detail-item">
                            <span>Project Location</span>
                            <strong>{{ $productEnquiry->project_location }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mk-card">
                <div class="mk-card-head">
                    <div>
                        <h2>Requirement Details</h2>
                        <p>Product interest and customer requirements.</p>
                    </div>
                </div>

                <div class="mk-card-body">
                    <div class="mk-detail-block">
                        <span>Product / Service Portfolio</span>
                        <strong>{{ $productEnquiry->product_portfolio }}</strong>
                    </div>

                    <div class="mk-detail-block">
                        <span>Requirements / Scope</span>
                        <div class="mk-requirement-box">
                            @if($productEnquiry->requirements)
                                {!! nl2br(e($productEnquiry->requirements)) !!}
                            @else
                                <em>No requirements provided.</em>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="mk-enquiry-sidebar">

            <div class="mk-card">
                <div class="mk-card-head">
                    <div>
                        <h2>Enquiry Status</h2>
                        <p>Current enquiry state.</p>
                    </div>
                </div>

                <div class="mk-card-body">
                    <div class="mk-status-panel">
                        <span>Current Status</span>

                        @if($productEnquiry->status === 'new')
                            <span class="mk-status mk-status-new">New</span>
                        @elseif($productEnquiry->status === 'contacted')
                            <span class="mk-status mk-status-contacted">Contacted</span>
                        @else
                            <span class="mk-status mk-status-closed">Closed</span>
                        @endif
                    </div>

                    <div class="mk-meta-list">
                        <div>
                            <span>Created At</span>
                            <strong>{{ $productEnquiry->created_at->format('d M Y, h:i A') }}</strong>
                        </div>

                        <div>
                            <span>Last Updated</span>
                            <strong>{{ $productEnquiry->updated_at->format('d M Y, h:i A') }}</strong>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mk-card mk-danger-card">
                <div class="mk-card-body">
                    <h2>Danger Zone</h2>
                    <p>Deleting this enquiry cannot be undone.</p>

                    <form action="{{ route('admin.product-enquiries.destroy', $productEnquiry) }}"
                          method="POST"
                          onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="mk-danger-btn">
                            Delete Enquiry
                        </button>
                    </form>
                </div>
            </div>

        </div>

    </div>

</div>
@endsection
