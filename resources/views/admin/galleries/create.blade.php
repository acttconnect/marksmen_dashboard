@extends('admin.layouts.app')

@section('title', 'Add Gallery')

@section('content')
<div class="mk-page">

    <div class="mk-page-header">
        <div>
            <div class="mk-eyebrow">CONTENT MANAGEMENT</div>
            <h1>Add Gallery</h1>
            <p>Create a new image or video gallery item.</p>
        </div>

        <a href="{{ route('admin.galleries.index') }}" class="mk-secondary-btn">
            Back to Gallery
        </a>
    </div>

    <div class="mk-card">
        <div class="mk-card-head">
            <div>
                <div class="mk-section-label">NEW MEDIA</div>
                <h2>Gallery Information</h2>
                <p>Add media, choose its category and set its status.</p>
            </div>
        </div>

        <form
            action="{{ route('admin.galleries.store') }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf

            @include('admin.galleries.form')

        </form>
    </div>

</div>
@endsection
