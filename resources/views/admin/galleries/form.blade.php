@php
    $isEdit = isset($gallery);
@endphp

<div class="mk-gallery-form">

    <div class="mk-gallery-form-grid">

        <div class="mk-gallery-form-group">
            <label for="category_id">
                Category <span class="required">*</span>
            </label>

            <select
                name="category_id"
                id="category_id"
                class="mk-select @error('category_id') mk-invalid @enderror"
                required
            >
                <option value="">Select Category</option>

                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id', $gallery->category_id ?? '') == $category->id ? 'selected' : '' }}
                    >
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <div class="mk-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mk-gallery-form-group">
            <label for="title">
                Title <span class="required">*</span>
            </label>

            <input
                type="text"
                name="title"
                id="title"
                class="mk-input @error('title') mk-invalid @enderror"
                value="{{ old('title', $gallery->title ?? '') }}"
                placeholder="Enter gallery title"
                required
            >

            @error('title')
                <div class="mk-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mk-gallery-form-group">
            <label for="media_type">
                Media Type <span class="required">*</span>
            </label>

            <select
                name="media_type"
                id="media_type"
                class="mk-select @error('media_type') mk-invalid @enderror"
                required
            >
                <option value="">Select Media Type</option>

                <option
                    value="image"
                    {{ old('media_type', $gallery->media_type ?? '') === 'image' ? 'selected' : '' }}
                >
                    Image
                </option>

                <option
                    value="video"
                    {{ old('media_type', $gallery->media_type ?? '') === 'video' ? 'selected' : '' }}
                >
                    Video
                </option>
            </select>

            @error('media_type')
                <div class="mk-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mk-gallery-form-group">
            <label for="status">
                Status <span class="required">*</span>
            </label>

            <select
                name="status"
                id="status"
                class="mk-select @error('status') mk-invalid @enderror"
                required
            >
                <option
                    value="active"
                    {{ old('status', $gallery->status ?? 'active') === 'active' ? 'selected' : '' }}
                >
                    Active
                </option>

                <option
                    value="inactive"
                    {{ old('status', $gallery->status ?? '') === 'inactive' ? 'selected' : '' }}
                >
                    Inactive
                </option>
            </select>

            @error('status')
                <div class="mk-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="mk-gallery-form-group full">
            <label for="media_file">
                Media File
                @if(!$isEdit)
                    <span class="required">*</span>
                @endif
            </label>

            <input
                type="file"
                name="media_file"
                id="media_file"
                class="mk-file @error('media_file') mk-invalid @enderror"
                accept="image/jpeg,image/png,image/jpg,image/webp,video/mp4,video/webm,video/ogg"
                {{ !$isEdit ? 'required' : '' }}
            >

            <div class="mk-help">
                Image: JPG, JPEG, PNG, WEBP. Video: MP4, WEBM, OGG. Maximum size: 50 MB.
            </div>

            @error('media_file')
                <div class="mk-error">{{ $message }}</div>
            @enderror
        </div>

        @if($isEdit && !empty($gallery->media_path))
            <div class="mk-gallery-form-group full">
                <label>Current Media</label>

                <div class="mk-gallery-media-box mk-gallery-current-media">
                    @if($gallery->media_type === 'image')
                        <img
                            src="{{ asset('storage/' . $gallery->media_path) }}"
                            alt="{{ $gallery->title }}"
                        >
                    @elseif($gallery->media_type === 'video')
                        <video controls>
                            <source src="{{ asset('storage/' . $gallery->media_path) }}">
                            Your browser does not support video playback.
                        </video>
                    @endif
                </div>
            </div>
        @endif

        <div class="mk-gallery-form-group full">
            <label>New Media Preview</label>

            <div id="media-preview-container" class="mk-gallery-preview-box">
                <img id="image-preview" src="" alt="Preview">
                <video id="video-preview" controls></video>
            </div>
        </div>

        <div class="mk-gallery-form-group full">
            <label for="thumbnail">Thumbnail / Preview</label>

            <input
                type="file"
                name="thumbnail"
                id="thumbnail"
                class="mk-file @error('thumbnail') mk-invalid @enderror"
                accept="image/jpeg,image/png,image/jpg,image/webp"
            >

            <div class="mk-help">
                Optional. JPG, JPEG, PNG or WEBP. Maximum size: 5 MB.
            </div>

            @error('thumbnail')
                <div class="mk-error">{{ $message }}</div>
            @enderror
        </div>

        @if($isEdit && !empty($gallery->thumbnail_path))
            <div class="mk-gallery-form-group full">
                <label>Current Thumbnail</label>

                <div class="mk-gallery-thumbnail">
                    <img
                        src="{{ asset('storage/' . $gallery->thumbnail_path) }}"
                        alt="{{ $gallery->title }} thumbnail"
                    >
                </div>
            </div>
        @endif

        <div class="mk-gallery-form-group full">
            <label for="description">Description</label>

            <textarea
                name="description"
                id="description"
                rows="5"
                class="mk-textarea @error('description') mk-invalid @enderror"
                placeholder="Enter gallery description"
            >{{ old('description', $gallery->description ?? '') }}</textarea>

            @error('description')
                <div class="mk-error">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="mk-gallery-form-footer">
        <a
            href="{{ route('admin.galleries.index') }}"
            class="mk-secondary-btn"
        >
            Cancel
        </a>

        <button type="submit" class="mk-primary-btn">
            @if($isEdit)
                Update Gallery
            @else
                Create Gallery
            @endif
        </button>
    </div>

</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const mediaType = document.getElementById('media_type');
    const mediaFile = document.getElementById('media_file');

    const previewContainer =
        document.getElementById('media-preview-container');

    const imagePreview =
        document.getElementById('image-preview');

    const videoPreview =
        document.getElementById('video-preview');


    /*
    |--------------------------------------------------------------------------
    | Change File Accept Attribute
    |--------------------------------------------------------------------------
    */

    function updateAcceptType() {

        if (!mediaType || !mediaFile) {
            return;
        }

        if (mediaType.value === 'image') {

            mediaFile.accept =
                'image/jpeg,image/png,image/jpg,image/webp';

        } else if (mediaType.value === 'video') {

            mediaFile.accept =
                'video/mp4,video/webm,video/ogg';

        } else {

            mediaFile.accept =
                'image/jpeg,image/png,image/jpg,image/webp,video/mp4,video/webm,video/ogg';
        }
    }


    /*
    |--------------------------------------------------------------------------
    | Preview Selected Media
    |--------------------------------------------------------------------------
    */

    function previewMedia() {

        if (!mediaFile || !mediaFile.files.length) {

            previewContainer.style.display = 'none';

            imagePreview.style.display = 'none';
            videoPreview.style.display = 'none';

            imagePreview.src = '';
            videoPreview.src = '';

            return;
        }


        const file = mediaFile.files[0];

        const objectUrl = URL.createObjectURL(file);


        previewContainer.style.display = 'block';


        /*
        |--------------------------------------------------------------------------
        | Image Preview
        |--------------------------------------------------------------------------
        */

        if (mediaType.value === 'image') {

            imagePreview.src = objectUrl;

            imagePreview.style.display = 'block';

            videoPreview.style.display = 'none';

            videoPreview.removeAttribute('src');

        }


        /*
        |--------------------------------------------------------------------------
        | Video Preview
        |--------------------------------------------------------------------------
        */

        else if (mediaType.value === 'video') {

            videoPreview.src = objectUrl;

            videoPreview.style.display = 'block';

            imagePreview.style.display = 'none';

            imagePreview.src = '';

        }

    }


    /*
    |--------------------------------------------------------------------------
    | Events
    |--------------------------------------------------------------------------
    */

    if (mediaType) {

        mediaType.addEventListener(
            'change',
            function () {

                updateAcceptType();

                /*
                | Clear selected file when media type changes
                */

                if (mediaFile) {
                    mediaFile.value = '';
                }

                previewContainer.style.display = 'none';

                imagePreview.style.display = 'none';

                videoPreview.style.display = 'none';
            }
        );

    }


    if (mediaFile) {

        mediaFile.addEventListener(
            'change',
            previewMedia
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Initial Setup
    |--------------------------------------------------------------------------
    */

    updateAcceptType();

});

</script>