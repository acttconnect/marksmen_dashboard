@extends('admin.layouts.app')

@section('title', 'Create Blog')

@section('content')

<div class="container-fluid">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h4 class="fw-bold mb-1">
                Create Blog
            </h4>

            <p class="text-muted mb-0">
                Create a new blog post
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

            <h5 class="mb-0 fw-bold">
                Blog Information
            </h5>

        </div>

        <div class="card-body p-4">

            <form
                action="{{ route('admin.blogs.store') }}"
                method="POST"
                enctype="multipart/form-data"
            >

                @csrf

                @include('admin.blogs.form')

            </form>

        </div>

    </div>

</div>

@endsection