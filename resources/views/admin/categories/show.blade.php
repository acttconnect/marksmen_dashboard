@extends('admin.layouts.app')

@section('title', 'Category Details')

@section('content')
<div class="mk-page">

    <div class="mk-page-header">
        <div>
            <div class="mk-eyebrow">CONTENT MANAGEMENT</div>
            <h1>Category Details</h1>
            <p>View the complete information for this category.</p>
        </div>

        <a href="{{ route('admin.categories.index') }}" class="mk-secondary-btn">
            Back to Categories
        </a>
    </div>

    <div class="mk-details-card">

        <div class="mk-form-head">
            <div>
                <div class="mk-section-label">CATEGORY INFORMATION</div>
                <h2>{{ $category->name }}</h2>
                <p>Category information and current status.</p>
            </div>

            <span class="mk-detail-status {{ $category->status === 'active' ? 'active' : 'inactive' }}">
                {{ ucfirst($category->status) }}
            </span>
        </div>

        <div class="mk-details-grid">

            <div class="mk-detail-item">
                <span class="mk-detail-label">Category Name</span>
                <strong>{{ $category->name }}</strong>
            </div>

            <div class="mk-detail-item">
                <span class="mk-detail-label">Slug</span>
                <strong class="mk-detail-slug">{{ $category->slug }}</strong>
            </div>

            <div class="mk-detail-item mk-full">
                <span class="mk-detail-label">Description</span>
                <div class="mk-detail-description">
                    {{ $category->description ?: 'No description added.' }}
                </div>
            </div>

            <div class="mk-detail-item">
                <span class="mk-detail-label">Status</span>
                <strong>{{ ucfirst($category->status) }}</strong>
            </div>

            <div class="mk-detail-item">
                <span class="mk-detail-label">Created</span>
                <strong>{{ $category->created_at->format('d M Y, h:i A') }}</strong>
            </div>

        </div>

        <div class="mk-detail-actions">
            <a href="{{ route('admin.categories.index') }}" class="mk-secondary-btn">
                Back
            </a>

            <a href="{{ route('admin.categories.edit', $category) }}" class="mk-primary-btn">
                Edit Category
            </a>
        </div>

    </div>

</div>
@endsection
