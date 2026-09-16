@extends('admin.layouts.app')

@section('title', 'Product Enquiries')

@section('content')
<div class="mk-page mk-enquiry-page">

    <div class="mk-page-header">
        <div>
            <div class="mk-eyebrow">ENQUIRY MANAGEMENT</div>
            <h1>Product Enquiries</h1>
            <p>Manage product and requirement enquiries.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="mk-alert mk-alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="mk-alert mk-alert-danger">
            <strong>Please fix the following errors:</strong>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mk-card mk-filter-card">
        <div class="mk-card-body">
            <form method="GET" action="{{ route('admin.product-enquiries.index') }}">

                <div class="mk-enquiry-filter-grid">
                    <div class="mk-form-group">
                        <label for="enquiry-search">Search</label>
                        <input id="enquiry-search" type="text" name="search"
                               value="{{ request('search') }}"
                               placeholder="Name, mobile, email, location...">
                    </div>

                    <div class="mk-form-group">
                        <label for="enquiry-status">Status</label>
                        <select id="enquiry-status" name="status">
                            <option value="">All Status</option>
                            <option value="new" {{ request('status') === 'new' ? 'selected' : '' }}>New</option>
                            <option value="contacted" {{ request('status') === 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="closed" {{ request('status') === 'closed' ? 'selected' : '' }}>Closed</option>
                        </select>
                    </div>

                    <div class="mk-form-group">
                        <label>Product / Portfolio</label>
                        <input type="text" value="{{ request('product_portfolio') }}"
                               name="product_portfolio"
                               placeholder="Product or service">
                    </div>

                    <div class="mk-form-group">
                        <label>Location</label>
                        <input type="text" value="{{ request('project_location') }}"
                               name="project_location"
                               placeholder="Project location">
                    </div>
                </div>

                <div class="mk-filter-actions">
                    <button type="submit" class="mk-primary-btn">Filter</button>
                    <a href="{{ route('admin.product-enquiries.index') }}" class="mk-secondary-btn">Reset</a>
                </div>

            </form>
        </div>
    </div>

    <div class="mk-card">
        <div class="mk-card-head mk-list-head">
            <div>
                <h2>Enquiry List</h2>
                <p>Review customer enquiries and update their status.</p>
            </div>
            <span class="mk-count-badge">{{ $enquiries->total() }} Total</span>
        </div>

        <div class="mk-table-wrap">
            <table class="mk-table mk-enquiry-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer</th>
                        <th>Contact</th>
                        <th>Location</th>
                        <th>Product / Portfolio</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th class="mk-text-right">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($enquiries as $enquiry)
                        <tr>
                            <td>{{ $enquiries->firstItem() + $loop->index }}</td>

                            <td>
                                <div class="mk-cell-title">{{ $enquiry->name }}</div>
                                <div class="mk-cell-muted">{{ $enquiry->email ?: 'No email' }}</div>
                            </td>

                            <td>
                                <a href="tel:{{ $enquiry->mobile_number }}" class="mk-table-link">
                                    {{ $enquiry->mobile_number }}
                                </a>
                            </td>

                            <td>{{ $enquiry->project_location }}</td>

                            <td>
                                <span class="mk-product-text">{{ $enquiry->product_portfolio }}</span>
                            </td>

                            <td>
                                @if($enquiry->status === 'new')
                                    <span class="mk-status mk-status-new">New</span>
                                @elseif($enquiry->status === 'contacted')
                                    <span class="mk-status mk-status-contacted">Contacted</span>
                                @else
                                    <span class="mk-status mk-status-closed">Closed</span>
                                @endif
                            </td>

                            <td>
                                <div class="mk-cell-title">{{ $enquiry->created_at->format('d M Y') }}</div>
                                <div class="mk-cell-muted">{{ $enquiry->created_at->format('h:i A') }}</div>
                            </td>

                            <td>
                                <div class="mk-row-actions">
                                    <a href="{{ route('admin.product-enquiries.show', $enquiry) }}"
                                       class="mk-action-btn mk-action-view">View</a>

                                    <a href="{{ route('admin.product-enquiries.edit', $enquiry) }}"
                                       class="mk-action-btn mk-action-edit">Edit</a>

                                    <form action="{{ route('admin.product-enquiries.destroy', $enquiry) }}"
                                          method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this enquiry?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="mk-action-btn mk-action-delete">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">
                                <div class="mk-empty-state">
                                    <h3>No enquiries found</h3>
                                    <p>There are no product enquiries matching your search.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($enquiries->hasPages())
            <div class="mk-pagination">
                {{ $enquiries->appends(request()->query())->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
