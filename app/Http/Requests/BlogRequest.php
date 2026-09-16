<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $blog = $this->route('blog');

        return [
            'title' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('blogs', 'slug')->ignore($blog?->id),
            ],

            'featured_image' => [
                'nullable',
                'image',
                'mimes:jpg,jpeg,png,webp',
                'max:5120',
            ],

            'short_description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'full_description' => [
                'nullable',
                'string',
            ],

            'status' => [
                'required',
                Rule::in([
                    'active',
                    'inactive',
                ]),
            ],

            'published_at' => [
                'nullable',
                'date',
            ],
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Blog title is required.',

            'title.max' => 'Blog title may not be greater than 255 characters.',

            'slug.unique' => 'This blog slug already exists.',

            'featured_image.image' => 'The featured image must be a valid image.',

            'featured_image.mimes' => 'Featured image must be JPG, JPEG, PNG or WEBP.',

            'featured_image.max' => 'Featured image size must not exceed 5 MB.',

            'short_description.max' => 'Short description may not exceed 1000 characters.',

            'status.required' => 'Please select blog status.',

            'status.in' => 'Blog status must be draft or published.',

            'published_at.date' => 'Please enter a valid publication date.',
        ];
    }
}