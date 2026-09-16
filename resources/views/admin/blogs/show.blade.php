@extends('admin.layouts.app')

@section('title', 'Blog Details')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h4 class="fw-bold mb-1">
                Blog Details
            </h4>

            <p class="text-muted mb-0">
                View blog information
            </p>

        </div>

        <div class="d-flex gap-2">

            <a
                href="{{ route('admin.blogs.edit', $blog) }}"
                class="btn btn-primary px-4"
            >
                <i class="bi bi-pencil-square me-1"></i>
                Edit
            </a>

            <a
                href="{{ route('admin.blogs.index') }}"
                class="btn btn-light border px-4"
            >
                <i class="bi bi-arrow-left me-1"></i>
                Back
            </a>

        </div>

    </div>


    {{-- MAIN CARD --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h5 class="fw-bold mb-1">
                        {{ $blog->title }}
                    </h5>

                    <small class="text-muted">
                        Blog ID: #{{ $blog->id }}
                    </small>

                </div>


                @if($blog->status === 'active')

                    <span class="badge rounded-pill bg-success-subtle text-success px-3 py-2">
                        <i class="bi bi-check-circle me-1"></i>
                        Active
                    </span>

                @else

                    <span class="badge rounded-pill bg-secondary-subtle text-secondary px-3 py-2">
                        <i class="bi bi-pause-circle me-1"></i>
                        Inactive
                    </span>

                @endif

            </div>

        </div>


        <div class="card-body p-4">

            <div class="row g-4">

                {{-- IMAGE --}}
                <div class="col-lg-6">

                    <div class="card border h-100">

                        <div class="card-header bg-light">

                            <h6 class="mb-0 fw-bold">
                                <i class="bi bi-image me-2"></i>
                                Featured Image
                            </h6>

                        </div>

                        <div class="card-body">

                            <div
                                class="rounded d-flex align-items-center justify-content-center"
                                style="
                                    min-height:400px;
                                    background:#f8f9fa;
                                    overflow:hidden;
                                "
                            >

                                @if($blog->featured_image)

                                    <img
                                        src="{{ asset('storage/' . $blog->featured_image) }}"
                                        alt="{{ $blog->title }}"
                                        class="img-fluid rounded"
                                        style="
                                            max-height:400px;
                                            max-width:100%;
                                            object-fit:contain;
                                        "
                                    >

                                @else

                                    <div class="text-center text-muted">

                                        <i
                                            class="bi bi-image"
                                            style="font-size:60px;"
                                        ></i>

                                        <p class="mt-3 mb-0">
                                            No featured image
                                        </p>

                                    </div>

                                @endif

                            </div>

                        </div>

                    </div>

                </div>


                {{-- INFORMATION --}}
                <div class="col-lg-6">

                    <div class="card border h-100">

                        <div class="card-header bg-light">

                            <h6 class="mb-0 fw-bold">
                                <i class="bi bi-info-circle me-2"></i>
                                Blog Information
                            </h6>

                        </div>

                        <div class="card-body">

                            <div class="mb-4">

                                <div class="text-muted small mb-1">
                                    Title
                                </div>

                                <div class="fw-semibold">
                                    {{ $blog->title }}
                                </div>

                            </div>


                            <div class="mb-4">

                                <div class="text-muted small mb-1">
                                    Slug
                                </div>

                                <div class="bg-light border rounded p-2">
                                    <code>
                                        {{ $blog->slug }}
                                    </code>
                                </div>

                            </div>


                            <div class="mb-4">

                                <div class="text-muted small mb-1">
                                    Status
                                </div>

                                @if($blog->status === 'active')

                                    <span class="badge bg-success-subtle text-success px-3 py-2">
                                        Active
                                    </span>

                                @else

                                    <span class="badge bg-secondary-subtle text-secondary px-3 py-2">
                                        Inactive
                                    </span>

                                @endif

                            </div>


                            <div class="mb-4">

                                <div class="text-muted small mb-1">
                                    Published At
                                </div>

                                @if($blog->published_at)

                                    <div class="fw-semibold">
                                        {{ $blog->published_at->format('d M Y, h:i A') }}
                                    </div>

                                @else

                                    <span class="text-muted">
                                        Not published
                                    </span>

                                @endif

                            </div>


                            <div class="mb-4">

                                <div class="text-muted small mb-1">
                                    Created At
                                </div>

                                <div>
                                    {{ $blog->created_at->format('d M Y, h:i A') }}
                                </div>

                            </div>


                            <div>

                                <div class="text-muted small mb-1">
                                    Updated At
                                </div>

                                <div>
                                    {{ $blog->updated_at->format('d M Y, h:i A') }}
                                </div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>


            {{-- SHORT DESCRIPTION --}}
            <div class="card border mt-4">

                <div class="card-header bg-light">

                    <h6 class="mb-0 fw-bold">
                        Short Description
                    </h6>

                </div>

                <div class="card-body">

                    @if($blog->short_description)

                        {!! nl2br(e($blog->short_description)) !!}

                    @else

                        <span class="text-muted">
                            No short description available.
                        </span>

                    @endif

                </div>

            </div>


            {{-- FULL DESCRIPTION --}}
            <div class="card border mt-4">

                <div class="card-header bg-light">

                    <h6 class="mb-0 fw-bold">
                        Full Description
                    </h6>

                </div>

                <div class="card-body">

                    @if($blog->full_description)

                        {!! nl2br(e($blog->full_description)) !!}

                    @else

                        <span class="text-muted">
                            No full description available.
                        </span>

                    @endif

                </div>

            </div>


            {{-- FILE INFORMATION --}}
            @if($blog->featured_image)

                <div class="card border mt-4">

                    <div class="card-header bg-light">

                        <h6 class="mb-0 fw-bold">
                            <i class="bi bi-file-earmark-image me-2"></i>
                            File Information
                        </h6>

                    </div>

                    <div class="card-body">

                        <div class="text-muted small mb-1">
                            Featured Image Path
                        </div>

                        <div class="bg-light border rounded p-2">

                            <code class="small">
                                {{ $blog->featured_image }}
                            </code>

                        </div>

                    </div>

                </div>

            @endif

        </div>


        {{-- FOOTER --}}
        <div class="card-footer bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <small class="text-muted">
                    Last updated
                    {{ $blog->updated_at->diffForHumans() }}
                </small>

                <div class="d-flex gap-2">

                    <a
                        href="{{ route('admin.blogs.index') }}"
                        class="btn btn-light border"
                    >
                        Back to Blogs
                    </a>

                    <a
                        href="{{ route('admin.blogs.edit', $blog) }}"
                        class="btn btn-primary"
                    >
                        <i class="bi bi-pencil-square me-1"></i>
                        Edit Blog
                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection