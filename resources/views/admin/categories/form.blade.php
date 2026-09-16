<div class="mk-form-grid">

    <div class="mk-form-group">
        <label for="category-name">Category Name <span>*</span></label>
        <input
            id="category-name"
            type="text"
            name="name"
            class="mk-form-input @error('name') mk-input-error @enderror"
            placeholder="Enter category name"
            value="{{ old('name', $category->name ?? '') }}"
        >

        @error('name')
            <p class="mk-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="mk-form-group">
        <label for="category-slug">Slug</label>
        <input
            id="category-slug"
            type="text"
            name="slug"
            class="mk-form-input"
            placeholder="category-slug"
            value="{{ old('slug', $category->slug ?? '') }}"
        >

        <p class="mk-help">Use a simple URL-friendly value.</p>
    </div>

    <div class="mk-form-group mk-full">
        <label for="category-description">Description</label>
        <textarea
            id="category-description"
            name="description"
            class="mk-form-textarea"
            rows="5"
            placeholder="Enter a short description..."
        >{{ old('description', $category->description ?? '') }}</textarea>
    </div>

    <div class="mk-form-group">
        <label for="category-status">Status</label>
        <select id="category-status" name="status" class="mk-form-input">
            <option value="active" @selected(old('status', $category->status ?? 'active') === 'active')>
                Active
            </option>
            <option value="inactive" @selected(old('status', $category->status ?? '') === 'inactive')>
                Inactive
            </option>
        </select>
    </div>

</div>
