@extends('admin.layouts.app')

@section('title', 'Blogs')

@section('content')

<div class="container-fluid">

    {{-- PAGE HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1">
                Blogs
            </h4>

            <p class="text-muted mb-0">
                Manage blog posts, status and publishing details
            </p>
        </div>

        <a
            href="{{ route('admin.blogs.create') }}"
            class="btn btn-primary px-4"
        >
            <i class="bi bi-plus-lg me-1"></i>
            Add Blog
        </a>
    </div>


    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div
            class="alert alert-success alert-dismissible fade show"
            role="alert"
        >
            <i class="bi bi-check-circle me-2"></i>
            {{ session('success') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>
        </div>
    @endif


    {{-- ERROR MESSAGE --}}
    @if(session('error'))
        <div
            class="alert alert-danger alert-dismissible fade show"
            role="alert"
        >
            <i class="bi bi-exclamation-circle me-2"></i>
            {{ session('error') }}

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>
        </div>
    @endif


    {{-- VALIDATION ERRORS --}}
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <strong>Please fix the following errors:</strong>

            <ul class="mb-0 mt-2">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

            <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
            ></button>
        </div>
    @endif


    {{-- SEARCH FILTER --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-body">

            <form
                action="{{ route('admin.blogs.index') }}"
                method="GET"
            >

                <div class="row g-3 align-items-end">

                    {{-- SEARCH --}}
                    <div class="col-lg-6 col-md-5">

                        <label class="form-label fw-semibold">
                            Search Blogs
                        </label>

                        <div class="input-group">

                            <span class="input-group-text bg-white">
                                <i class="bi bi-search"></i>
                            </span>

                            <input
                                type="text"
                                name="search"
                                value="{{ request('search') }}"
                                class="form-control"
                                placeholder="Search by title, slug or description..."
                            >

                        </div>

                    </div>


                    {{-- STATUS --}}
                    <div class="col-lg-3 col-md-3">

                        <label class="form-label fw-semibold">
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-select"
                        >

                            <option value="">
                                All Status
                            </option>

                            <option
                                value="draft"
                                {{ request('status') === 'draft' ? 'selected' : '' }}
                            >
                                Draft
                            </option>

                            <option
                                value="published"
                                {{ request('status') === 'published' ? 'selected' : '' }}
                            >
                                Published
                            </option>

                        </select>

                    </div>


                    {{-- BUTTONS --}}
                    <div class="col-lg-3 col-md-4">

                        <div class="d-flex gap-2">

                            <button
                                type="submit"
                                class="btn btn-primary"
                            >
                                <i class="bi bi-search me-1"></i>
                                Search
                            </button>

                            <a
                                href="{{ route('admin.blogs.index') }}"
                                class="btn btn-light border"
                            >
                                <i class="bi bi-arrow-clockwise me-1"></i>
                                Reset
                            </a>

                        </div>

                    </div>

                </div>

            </form>

        </div>

    </div>


    {{-- BLOG TABLE --}}
    <div class="card border-0 shadow-sm">

        {{-- TABLE HEADER --}}
        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h5 class="mb-1 fw-bold">
                        All Blogs
                    </h5>

                    <small class="text-muted">
                        Manage your blog content
                    </small>

                </div>

                <span class="badge bg-light text-dark border px-3 py-2">
                    Total: {{ $blogs->total() }}
                </span>

            </div>

        </div>


        {{-- TABLE --}}
        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light">

                        <tr>

                            <th
                                class="px-4"
                                style="width:70px;"
                            >
                                #
                            </th>

                            <th style="width:100px;">
                                Image
                            </th>

                            <th>
                                Blog
                            </th>

                            <th>
                                Slug
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Published
                            </th>

                            <th>
                                Created
                            </th>

                            <th
                                class="text-end px-4"
                                style="width:240px;"
                            >
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @forelse($blogs as $blog)

                            <tr>

                                {{-- ID --}}
                                <td class="px-4">

                                    <span class="text-muted">
                                        #{{ $blog->id }}
                                    </span>

                                </td>


                                {{-- IMAGE --}}
                                <td>

                                    @if($blog->featured_image)

                                        <img
                                            src="{{ asset('storage/' . $blog->featured_image) }}"
                                            alt="{{ $blog->title }}"
                                            class="rounded border"
                                            style="
                                                width:80px;
                                                height:60px;
                                                object-fit:cover;
                                            "
                                        >

                                    @else

                                        <div
                                            class="bg-light border rounded d-flex align-items-center justify-content-center"
                                            style="
                                                width:80px;
                                                height:60px;
                                            "
                                        >

                                            <i
                                                class="bi bi-image text-muted"
                                                style="font-size:22px;"
                                            ></i>

                                        </div>

                                    @endif

                                </td>


                                {{-- BLOG --}}
                                <td>

                                    <div
                                        class="fw-semibold text-dark"
                                        style="max-width:280px;"
                                    >
                                        {{ $blog->title }}
                                    </div>

                                    @if($blog->short_description)

                                        <div
                                            class="text-muted small text-truncate mt-1"
                                            style="max-width:280px;"
                                        >
                                            {{ $blog->short_description }}
                                        </div>

                                    @endif

                                </td>


                                {{-- SLUG --}}
                                <td>

                                    <code
                                        class="small"
                                        style="white-space:nowrap;"
                                    >
                                        {{ $blog->slug }}
                                    </code>

                                </td>


                                {{-- STATUS --}}
                                <td>

                                    @if($blog->status === 'draft')

                                        <span
                                            class="badge rounded-pill bg-success-subtle text-success px-3 py-2"
                                        >
                                            <i class="bi bi-check-circle me-1"></i>
                                            Draft
                                        </span>

                                    @else

                                        <span
                                            class="badge rounded-pill bg-secondary-subtle text-secondary px-3 py-2"
                                        >
                                            <i class="bi bi-pause-circle me-1"></i>
                                            Inactive
                                        </span>

                                    @endif

                                </td>


                                {{-- PUBLISHED --}}
                                <td>

                                    @if($blog->published_at)

                                        <div class="fw-semibold small">
                                            {{ $blog->published_at->format('d M Y') }}
                                        </div>

                                        <div class="text-muted small">
                                            {{ $blog->published_at->format('h:i A') }}
                                        </div>

                                    @else

                                        <span class="text-muted small">
                                            Not published
                                        </span>

                                    @endif

                                </td>


                                {{-- CREATED --}}
                                <td>

                                    <div class="small">
                                        {{ $blog->created_at->format('d M Y') }}
                                    </div>

                                    <div class="text-muted small">
                                        {{ $blog->created_at->format('h:i A') }}
                                    </div>

                                </td>


                                {{-- ACTIONS --}}
                                <td class="text-end px-4">

                                    <div class="d-flex justify-content-end gap-1">

                                        {{-- VIEW --}}
                                        <a
                                            href="{{ route('admin.blogs.show', $blog) }}"
                                            class="btn btn-sm btn-light border"
                                            title="View Blog"
                                        >
                                            <i class="bi bi-eye me-1"></i>
                                            View
                                        </a>


                                        {{-- EDIT --}}
                                        <a
                                            href="{{ route('admin.blogs.edit', $blog) }}"
                                            class="btn btn-sm btn-primary"
                                            title="Edit Blog"
                                        >
                                            <i class="bi bi-pencil me-1"></i>
                                            Edit
                                        </a>


                                        {{-- DELETE --}}
                                        <form
                                            action="{{ route('admin.blogs.destroy', $blog) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Are you sure you want to delete this blog?');"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="btn btn-sm btn-danger"
                                                title="Delete Blog"
                                            >
                                                <i class="bi bi-trash me-1"></i>
                                                Delete
                                            </button>

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @empty

                            {{-- EMPTY STATE --}}
                            <tr>

                                <td
                                    colspan="8"
                                    class="text-center py-5"
                                >

                                    <div class="text-muted">

                                        <i
                                            class="bi bi-journal-text"
                                            style="font-size:50px;"
                                        ></i>

                                        <h6 class="mt-3 fw-semibold">
                                            No Blogs Found
                                        </h6>

                                        <p class="mb-3">
                                            No blog posts match your search criteria.
                                        </p>

                                        <a
                                            href="{{ route('admin.blogs.create') }}"
                                            class="btn btn-primary"
                                        >
                                            <i class="bi bi-plus-lg me-1"></i>
                                            Create Blog
                                        </a>

                                    </div>

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>


        {{-- PAGINATION --}}
        @if($blogs->hasPages())

            <div class="card-footer bg-white">

                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                    <small class="text-muted">

                        Showing
                        {{ $blogs->firstItem() }}
                        to
                        {{ $blogs->lastItem() }}
                        of
                        {{ $blogs->total() }}
                        blogs

                    </small>

                    <div>
                        {{ $blogs->links() }}
                    </div>

                </div>

            </div>

        @endif

    </div>

</div>

@endsection