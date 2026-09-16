@extends('admin.layouts.app')

@section('title', 'Edit Blog')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h4 class="fw-bold mb-1">
                Edit Blog
            </h4>

            <p class="text-muted mb-0">
                Update blog information
            </p>

        </div>

        <a
            href="{{ route('admin.blogs.index') }}"
            class="btn btn-light border"
        >
            <i class="bi bi-arrow-left me-1"></i>
            Back
        </a>

    </div>


    {{-- VALIDATION --}}
    @if($errors->any())

        <div class="alert alert-danger">

            <strong>
                Please fix the following errors:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- FORM --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header bg-white py-3">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h5 class="mb-0 fw-bold">
                        Edit Blog
                    </h5>

                    <small class="text-muted">
                        Blog ID: #{{ $blog->id }}
                    </small>

                </div>

                <span class="badge bg-light text-dark border">
                    Editing
                </span>

            </div>

        </div>


        <div class="card-body p-4">

            <form
                action="{{ route('admin.blogs.update', $blog) }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf
                @method('PUT')

                @include('admin.blogs.form')

            </form>

        </div>

    </div>

</div>

@endsection