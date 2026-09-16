@extends('admin.layouts.app')

@section('title', 'Gallery')

@section('content')
<div class="mk-page">

    <div class="mk-page-header">
        <div>
            <div class="mk-eyebrow">CONTENT MANAGEMENT</div>
            <h1>Gallery Management</h1>
            <p>Manage website images and videos.</p>
        </div>

        <a href="{{ route('admin.galleries.create') }}" class="mk-create-btn">
            + Add Media
        </a>
    </div>

    <div class="mk-card">
        <div class="mk-card-head">
            <div>
                <div class="mk-section-label">MEDIA FILTERS</div>
                <h2>Search & Filter</h2>
            </div>
        </div>

        <div class="mk-card-body">
            <form method="GET" action="{{ route('admin.galleries.index') }}">

                <div class="mk-gallery-filter-grid">

                    <div class="mk-field">
                        <label for="gallery-search">Search</label>
                        <input
                            id="gallery-search"
                            type="text"
                            name="search"
                            class="mk-input"
                            placeholder="Search media..."
                            value="{{ request('search') }}"
                        >
                    </div>

                    <div class="mk-field">
                        <label for="gallery-category">Category</label>
                        <select id="gallery-category" name="category_id" class="mk-select">
                            <option value="">All Categories</option>

                            @foreach($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    @selected(request('category_id') == $category->id)
                                >
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mk-field">
                        <label for="gallery-type">Media Type</label>
                        <select id="gallery-type" name="media_type" class="mk-select">
                            <option value="">All Media</option>
                            <option value="image" @selected(request('media_type') === 'image')>Image</option>
                            <option value="video" @selected(request('media_type') === 'video')>Video</option>
                        </select>
                    </div>

                    <div class="mk-field">
                        <label for="gallery-status">Status</label>
                        <select id="gallery-status" name="status" class="mk-select">
                            <option value="">All Status</option>
                            <option value="active" @selected(request('status') === 'active')>Active</option>
                            <option value="inactive" @selected(request('status') === 'inactive')>Inactive</option>
                        </select>
                    </div>

                </div>

                <div class="mk-gallery-filter-actions">
                    <button type="submit" class="mk-primary-btn">
                        Filter
                    </button>

                    <a href="{{ route('admin.galleries.index') }}" class="mk-secondary-btn">
                        Reset
                    </a>
                </div>

            </form>
        </div>
    </div>

    <div class="mk-card" style="margin-top:14px;">
        <div class="mk-card-head">
            <div>
                <div class="mk-section-label">GALLERY</div>
                <h2>All Media</h2>
                <p>Manage uploaded images and videos.</p>
            </div>
        </div>

        <div class="mk-table-wrap">
            <table class="mk-table mk-gallery-table">
                <thead>
                    <tr>
                        <th>Preview</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Media Type</th>
                        <th>Status</th>
                        <th>Created</th>
                        <th class="mk-text-right">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($galleries as $gallery)
                        <tr>
                            <td>
                                <div class="mk-gallery-preview">
                                    @if($gallery->media_type === 'image')
                                        <img
                                            src="{{ asset('storage/'.$gallery->media_path) }}"
                                            alt="{{ $gallery->title }}"
                                        >
                                    @else
                                        <div class="mk-gallery-preview mk-gallery-video-preview">
                                            VIDEO
                                        </div>
                                    @endif
                                </div>
                            </td>

                            <td>
                                <div class="mk-gallery-title">
                                    {{ $gallery->title }}
                                </div>
                            </td>

                            <td>
                                <span class="mk-gallery-category">
                                    {{ $gallery->category->name ?? '-' }}
                                </span>
                            </td>

                            <td>
                                @if($gallery->media_type === 'image')
                                    <span class="mk-media-type mk-media-image">Image</span>
                                @else
                                    <span class="mk-media-type mk-media-video">Video</span>
                                @endif
                            </td>

                            <td>
                                @if($gallery->status === 'active')
                                    <span class="mk-gallery-status-active">Active</span>
                                @else
                                    <span class="mk-gallery-status-inactive">Inactive</span>
                                @endif
                            </td>

                            <td>
                                <div class="mk-date">
                                    {{ $gallery->created_at->format('d M Y') }}
                                </div>
                            </td>

                            <td class="mk-text-right">
                                <div class="mk-row-actions">

                                    <a
                                        href="{{ route('admin.galleries.show', $gallery) }}"
                                        class="mk-row-btn"
                                    >
                                        View
                                    </a>

                                    <a
                                        href="{{ route('admin.galleries.edit', $gallery) }}"
                                        class="mk-row-btn mk-row-btn-edit"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.galleries.destroy', $gallery) }}"
                                        method="POST"
                                        onsubmit="return confirm('Delete this media?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="mk-row-btn mk-row-btn-delete">
                                            Delete
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="7">
                                <div class="mk-empty">
                                    <h3>No Gallery Media Found</h3>
                                    <p>No gallery items match your current filters.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($galleries->hasPages())
            <div class="mk-pagination">
                {{ $galleries->links() }}
            </div>
        @endif
    </div>

</div>
@endsection
