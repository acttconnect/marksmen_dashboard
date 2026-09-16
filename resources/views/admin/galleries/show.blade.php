@extends('admin.layouts.app')

@section('title', 'Gallery Details')

@section('content')
<div class="mk-page">

    <div class="mk-page-header">
        <div>
            <div class="mk-eyebrow">CONTENT MANAGEMENT</div>
            <h1>Gallery Details</h1>
            <p>View and manage gallery information.</p>
        </div>

        <div class="mk-header-actions">
            <a href="{{ route('admin.galleries.index') }}" class="mk-secondary-btn">
                Back
            </a>

            <a href="{{ route('admin.galleries.edit', $gallery) }}" class="mk-primary-btn">
                Edit
            </a>
        </div>
    </div>

    <div class="mk-gallery-show-card">

        <div class="mk-gallery-show-head">
            <div>
                <div class="mk-section-label">GALLERY ITEM</div>
                <h2>{{ $gallery->title }}</h2>
                <p>Gallery ID: #{{ $gallery->id }}</p>
            </div>

            @if($gallery->status === 'active')
                <span class="mk-gallery-status-active">Active</span>
            @else
                <span class="mk-gallery-status-inactive">Inactive</span>
            @endif
        </div>

        <div class="mk-gallery-show-body">

            <div class="mk-gallery-show-grid">

                <div>
                    <div class="mk-section-label" style="margin-bottom:8px;">MEDIA PREVIEW</div>

                    <div class="mk-gallery-media-view">
                        @if($gallery->media_type === 'image' && $gallery->media_path)

                            <img
                                src="{{ asset('storage/' . $gallery->media_path) }}"
                                alt="{{ $gallery->title }}"
                            >

                        @elseif($gallery->media_type === 'video' && $gallery->media_path)

                            <video controls>
                                <source src="{{ asset('storage/' . $gallery->media_path) }}">
                                Your browser does not support video playback.
                            </video>

                        @else

                            <div class="mk-gallery-no-media">
                                No media available
                            </div>

                        @endif
                    </div>
                </div>

                <div>
                    <div class="mk-section-label" style="margin-bottom:8px;">GALLERY INFORMATION</div>

                    <div class="mk-gallery-info-list">

                        <div class="mk-gallery-info-item">
                            <div class="mk-gallery-info-label">Title</div>
                            <div class="mk-gallery-info-value">
                                {{ $gallery->title }}
                            </div>
                        </div>

                        <div class="mk-gallery-info-item">
                            <div class="mk-gallery-info-label">Category</div>
                            <div class="mk-gallery-info-value">
                                {{ $gallery->category->name ?? 'N/A' }}
                            </div>
                        </div>

                        <div class="mk-gallery-info-item">
                            <div class="mk-gallery-info-label">Media Type</div>
                            <div class="mk-gallery-info-value">
                                @if($gallery->media_type === 'image')
                                    <span class="mk-media-type mk-media-image">Image</span>
                                @else
                                    <span class="mk-media-type mk-media-video">Video</span>
                                @endif
                            </div>
                        </div>

                        <div class="mk-gallery-info-item">
                            <div class="mk-gallery-info-label">Status</div>
                            <div class="mk-gallery-info-value">
                                @if($gallery->status === 'active')
                                    <span class="mk-gallery-status-active">Active</span>
                                @else
                                    <span class="mk-gallery-status-inactive">Inactive</span>
                                @endif
                            </div>
                        </div>

                        <div class="mk-gallery-info-item">
                            <div class="mk-gallery-info-label">Description</div>
                            <div class="mk-gallery-info-value">
                                @if($gallery->description)
                                    {!! nl2br(e($gallery->description)) !!}
                                @else
                                    <span style="color:var(--mk-muted);font-weight:400;">
                                        No description available.
                                    </span>
                                @endif
                            </div>
                        </div>

                    </div>

                    <div class="mk-gallery-date-grid">
                        <div>
                            <div class="mk-gallery-info-label">Created</div>
                            <div class="mk-gallery-info-value">
                                {{ $gallery->created_at->format('d M Y') }}
                            </div>
                            <div class="mk-subtext">
                                {{ $gallery->created_at->format('h:i A') }}
                            </div>
                        </div>

                        <div>
                            <div class="mk-gallery-info-label">Updated</div>
                            <div class="mk-gallery-info-value">
                                {{ $gallery->updated_at->format('d M Y') }}
                            </div>
                            <div class="mk-subtext">
                                {{ $gallery->updated_at->format('h:i A') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            @if($gallery->thumbnail_path)
                <div class="mk-gallery-show-card mk-gallery-file-card">
                    <div class="mk-card-head">
                        <div>
                            <div class="mk-section-label">THUMBNAIL</div>
                            <h2>Thumbnail / Preview</h2>
                        </div>
                    </div>

                    <div class="mk-gallery-show-body">
                        <div class="mk-gallery-thumbnail">
                            <img
                                src="{{ asset('storage/' . $gallery->thumbnail_path) }}"
                                alt="{{ $gallery->title }} Thumbnail"
                            >
                        </div>
                    </div>
                </div>
            @endif

            <div class="mk-gallery-show-card mk-gallery-file-card">
                <div class="mk-card-head">
                    <div>
                        <div class="mk-section-label">FILE INFORMATION</div>
                        <h2>Media Files</h2>
                    </div>
                </div>

                <div class="mk-gallery-show-body">
                    <div class="mk-gallery-form-grid">

                        <div>
                            <div class="mk-gallery-info-label">Media Path</div>
                            <div class="mk-gallery-file-path">
                                {{ $gallery->media_path }}
                            </div>
                        </div>

                        <div>
                            <div class="mk-gallery-info-label">Thumbnail Path</div>
                            <div class="mk-gallery-file-path">
                                @if($gallery->thumbnail_path)
                                    {{ $gallery->thumbnail_path }}
                                @else
                                    No thumbnail
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <div class="mk-gallery-footer">
            <small class="mk-subtext">
                Last updated {{ $gallery->updated_at->diffForHumans() }}
            </small>

            <div class="mk-gallery-footer-actions">
                <a
                    href="{{ route('admin.galleries.index') }}"
                    class="mk-secondary-btn"
                >
                    Back to Gallery
                </a>

                <a
                    href="{{ route('admin.galleries.edit', $gallery) }}"
                    class="mk-primary-btn"
                >
                    Edit Gallery
                </a>
            </div>
        </div>

    </div>

</div>
@endsection
