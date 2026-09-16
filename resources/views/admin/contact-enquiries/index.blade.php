@extends('admin.layouts.app')

@section('title', 'Contact Enquiries')

@section('content')

<div class="mk-page mk-enquiry-page">

    {{-- PAGE HEADER --}}
    <div class="mk-page-header">
        <div>
            <div class="mk-eyebrow">CONTACT MANAGEMENT</div>

            <h1>Contact Enquiries</h1>

            <p>Manage contact and callback enquiries.</p>
        </div>
    </div>


    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="mk-alert mk-alert-success">
            {{ session('success') }}
        </div>
    @endif


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


    {{-- FILTER --}}
    <div class="mk-filter-card">

        <div class="mk-card-body">

            <form
                method="GET"
                action="{{ route('admin.contact-enquiries.index') }}"
            >

                <div class="mk-enquiry-filter-grid">

                    {{-- SEARCH --}}
                    <div class="mk-field">
                        <label for="search">Search</label>

                        <input
                            id="search"
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            class="mk-form-input"
                            placeholder="Name, mobile, email..."
                        >
                    </div>


                    {{-- LOCATION --}}
                    <div class="mk-field">
                        <label for="location">Location</label>

                        <input
                            id="location"
                            type="text"
                            name="location"
                            value="{{ request('location') }}"
                            class="mk-form-input"
                            placeholder="Location"
                        >
                    </div>


                    {{-- PRODUCT --}}
                    <div class="mk-field">
                        <label for="product_enquiry">Product Enquiry</label>

                        <input
                            id="product_enquiry"
                            type="text"
                            name="product_enquiry"
                            value="{{ request('product_enquiry') }}"
                            class="mk-form-input"
                            placeholder="Product or service"
                        >
                    </div>


                    {{-- EMAIL --}}
                    <div class="mk-field">
                        <label for="email">Email</label>

                        <input
                            id="email"
                            type="text"
                            name="email"
                            value="{{ request('email') }}"
                            class="mk-form-input"
                            placeholder="Email address"
                        >
                    </div>

                </div>


                {{-- ACTIONS --}}
                <div class="mk-filter-actions">

                    <button
                        type="submit"
                        class="mk-primary-btn"
                    >
                        Search
                    </button>

                    <a
                        href="{{ route('admin.contact-enquiries.index') }}"
                        class="mk-secondary-btn"
                    >
                        Reset
                    </a>

                </div>

            </form>

        </div>

    </div>


    {{-- ENQUIRY LIST --}}
    <div class="mk-card">

        <div class="mk-card-head">

            <div>
                <h2>Contact Enquiry List</h2>

                <p>
                    Review customer enquiries and contact information.
                </p>
            </div>

            <div class="mk-total">
                <strong>{{ $enquiries->total() }}</strong>
                Total
            </div>

        </div>


        {{-- TABLE --}}
        <div class="mk-table-wrap">

            <table class="mk-table mk-enquiry-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Contact</th>
                        <th>Location</th>
                        <th>Product / Portfolio</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th class="mk-text-right">Actions</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($enquiries as $enquiry)

                        <tr>

                            {{-- NUMBER --}}
                            <td>
                                {{ $enquiries->firstItem() + $loop->index }}
                            </td>


                            {{-- CUSTOMER --}}
                            <td>

                                <div class="mk-cell-title">
                                    {{ $enquiry->name }}
                                </div>

                                <div class="mk-cell-muted">
                                    {{ $enquiry->email ?: 'No email' }}
                                </div>

                            </td>


                            {{-- CONTACT --}}
                            <td>

                                <a
                                    href="tel:{{ $enquiry->mobile_number }}"
                                    class="mk-table-link"
                                >
                                    {{ $enquiry->mobile_number }}
                                </a>

                            </td>


                            {{-- LOCATION --}}
                            <td>
                                {{ $enquiry->location ?: '—' }}
                            </td>


                            {{-- PRODUCT --}}
                            <td>

                                <span class="mk-product-text">
                                    {{ $enquiry->product_enquiry ?: '—' }}
                                </span>

                            </td>


                            {{-- MESSAGE --}}
                            <td>

                                @if($enquiry->message)

                                    <span
                                        title="{{ $enquiry->message }}"
                                        class="mk-product-text"
                                    >
                                        {{ $enquiry->message }}
                                    </span>

                                @else

                                    <span class="mk-cell-muted">
                                        No message
                                    </span>

                                @endif

                            </td>


                            {{-- DATE --}}
                            <td>

                                <div class="mk-cell-title">
                                    {{ $enquiry->created_at->format('d M Y') }}
                                </div>

                                <div class="mk-cell-muted">
                                    {{ $enquiry->created_at->format('h:i A') }}
                                </div>

                            </td>


                            {{-- ACTIONS --}}
                            <td>

                                <div class="mk-row-actions">

                                    <a
                                        href="{{ route('admin.contact-enquiries.show', $enquiry) }}"
                                        class="mk-row-btn"
                                    >
                                        View
                                    </a>


                                    <a
                                        href="{{ route('admin.contact-enquiries.edit', $enquiry) }}"
                                        class="mk-row-btn mk-row-btn-edit"
                                    >
                                        Edit
                                    </a>


                                    <form
                                        action="{{ route('admin.contact-enquiries.destroy', $enquiry) }}"
                                        method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this contact enquiry?');"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="mk-row-btn mk-row-btn-delete"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td colspan="8">

                                <div class="mk-empty">

                                    <h3>
                                        No contact enquiries found
                                    </h3>

                                    <p>
                                        There are no enquiries matching your search.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- PAGINATION --}}
        @if($enquiries->hasPages())

            <div class="mk-pagination">
                {{ $enquiries->appends(request()->query())->links() }}
            </div>

        @endif

    </div>

</div>

@endsection