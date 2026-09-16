@php
    $isEdit = isset($blog);
@endphp

<div class="row g-4">

    {{-- TITLE --}}
    <div class="col-md-8">

        <label
            for="title"
            class="form-label fw-semibold"
        >
            Blog Title
            <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title', $blog->title ?? '') }}"
            class="form-control @error('title') is-invalid @enderror"
            placeholder="Enter blog title"
            required
        >

        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- STATUS --}}
    <div class="col-md-4">

        <label
            for="status"
            class="form-label fw-semibold"
        >
            Status
            <span class="text-danger">*</span>
        </label>

        <select
            name="status"
            id="status"
            class="form-select @error('status') is-invalid @enderror"
            required
        >

            <option value="published"
                {{ old('status', $blog->status ?? 'published') === 'published' ? 'selected' : '' }}>
                published
            </option>

            <option value="draft"
                {{ old('status', $blog->status ?? '') === 'draft' ? 'selected' : '' }}>
                draft
            </option>

        </select>

        @error('status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- SLUG --}}
    <div class="col-md-8">

        <label
            for="slug"
            class="form-label fw-semibold"
        >
            Slug
        </label>

        <input
            type="text"
            name="slug"
            id="slug"
            value="{{ old('slug', $blog->slug ?? '') }}"
            class="form-control @error('slug') is-invalid @enderror"
            placeholder="blog-slug"
        >

        <div class="form-text">
            Leave blank to generate automatically from title.
        </div>

        @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- PUBLISHED DATE --}}
    <div class="col-md-4">

        <label
            for="published_at"
            class="form-label fw-semibold"
        >
            Published Date
        </label>

        <input
            type="datetime-local"
            name="published_at"
            id="published_at"
            value="{{ old(
                'published_at',
                isset($blog) && $blog->published_at
                    ? $blog->published_at->format('Y-m-d\TH:i')
                    : ''
            ) }}"
            class="form-control @error('published_at') is-invalid @enderror"
        >

        @error('published_at')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- FEATURED IMAGE --}}
    <div class="col-md-12">

        <label
            for="featured_image"
            class="form-label fw-semibold"
        >
            Featured Image
        </label>

        <input
            type="file"
            name="featured_image"
            id="featured_image"
            accept="image/jpeg,image/png,image/jpg,image/webp"
            class="form-control @error('featured_image') is-invalid @enderror"
        >

        <div class="form-text">
            JPG, JPEG, PNG or WEBP. Maximum size: 5 MB.
        </div>

        @error('featured_image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- CURRENT IMAGE --}}
    @if($isEdit && $blog->featured_image)

        <div class="col-md-12">

            <label class="form-label fw-semibold">
                Current Featured Image
            </label>

            <div
                class="border rounded p-3 bg-light"
                style="max-width:400px;"
            >

                <img
                    src="{{ asset('storage/' . $blog->featured_image) }}"
                    alt="{{ $blog->title }}"
                    class="img-fluid rounded"
                    style="
                        max-height:250px;
                        object-fit:contain;
                    "
                >

            </div>

        </div>

    @endif


    {{-- NEW IMAGE PREVIEW --}}
    <div
        class="col-md-12"
        id="image-preview-wrapper"
        style="display:none;"
    >

        <label class="form-label fw-semibold">
            New Image Preview
        </label>

        <div
            class="border rounded p-3 bg-light"
            style="max-width:400px;"
        >

            <img
                id="image-preview"
                src=""
                alt="Image Preview"
                class="img-fluid rounded"
                style="
                    max-height:250px;
                    object-fit:contain;
                "
            >

        </div>

    </div>


    {{-- SHORT DESCRIPTION --}}
    <div class="col-md-12">

        <label
            for="short_description"
            class="form-label fw-semibold"
        >
            Short Description
        </label>

        <textarea
            name="short_description"
            id="short_description"
            rows="4"
            class="form-control @error('short_description') is-invalid @enderror"
            placeholder="Enter short description"
        >{{ old('short_description', $blog->short_description ?? '') }}</textarea>

        @error('short_description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>


    {{-- FULL DESCRIPTION --}}
    <div class="col-md-12">

        <label
            for="full_description"
            class="form-label fw-semibold"
        >
            Full Description
        </label>

        <textarea
            name="full_description"
            id="full_description"
            rows="10"
            class="form-control @error('full_description') is-invalid @enderror"
            placeholder="Enter complete blog content"
        >{{ old('full_description', $blog->full_description ?? '') }}</textarea>

        @error('full_description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

    </div>

</div>


{{-- BUTTONS --}}
<div class="d-flex justify-content-end gap-2 mt-4">

    <a
        href="{{ route('admin.blogs.index') }}"
        class="btn btn-light border px-4"
    >
        Cancel
    </a>

    <button
        type="submit"
        class="btn btn-primary px-4"
    >

        @if($isEdit)

            <i class="bi bi-check-lg me-1"></i>
            Update Blog

        @else

            <i class="bi bi-plus-lg me-1"></i>
            Create Blog

        @endif

    </button>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const title = document.getElementById('title');
    const slug = document.getElementById('slug');
    const imageInput = document.getElementById('featured_image');

    const previewWrapper =
        document.getElementById('image-preview-wrapper');

    const imagePreview =
        document.getElementById('image-preview');


    // Auto slug
    if (title && slug) {

        title.addEventListener('input', function () {

            @if(!$isEdit)

                if (!slug.value) {

                    slug.value = this.value
                        .toLowerCase()
                        .trim()
                        .replace(/[^a-z0-9\s-]/g, '')
                        .replace(/\s+/g, '-')
                        .replace(/-+/g, '-');

                }

            @endif

        });

    }


    // Image preview
    if (imageInput) {

        imageInput.addEventListener('change', function () {

            const file = this.files[0];

            if (!file) {

                previewWrapper.style.display = 'none';

                imagePreview.src = '';

                return;
            }


            if (!file.type.startsWith('image/')) {

                previewWrapper.style.display = 'none';

                imagePreview.src = '';

                return;
            }


            const objectUrl =
                URL.createObjectURL(file);

            imagePreview.src = objectUrl;

            previewWrapper.style.display = 'block';

        });

    }

});

</script>