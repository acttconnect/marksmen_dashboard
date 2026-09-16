@extends('admin.layouts.app')

@section('title', 'Edit Gallery')

@section('content')
<div class="mk-page">

    <div class="mk-page-header">
        <div>
            <div class="mk-eyebrow">CONTENT MANAGEMENT</div>
            <h1>Edit Gallery</h1>
            <p>Update gallery image or video information.</p>
        </div>

        <a href="{{ route('admin.galleries.index') }}" class="mk-secondary-btn">
            Back to Gallery
        </a>
    </div>

    <div class="mk-card">
        <div class="mk-card-head">
            <div>
                <div class="mk-section-label">EDIT MEDIA</div>
                <h2>{{ $gallery->title }}</h2>
                <p>Update the gallery item and replace its media when needed.</p>
            </div>
        </div>

        <form
            action="{{ route('admin.galleries.update', $gallery->id) }}"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            @method('PUT')

            @include('admin.galleries.form', [
                'gallery' => $gallery
            ])

        </form>
    </div>

</div>
@endsection
