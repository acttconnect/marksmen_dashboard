<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactEnquiryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'mobile_number' => [
                'required',
                'string',
                'max:20',
            ],

            'location' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'product_enquiry' => [
                'required',
                'string',
                'max:255',
            ],

            'message' => [
                'nullable',
                'string',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'mobile_number.required' => 'Mobile number is required.',
            'location.required' => 'Location is required.',
            'email.email' => 'Please enter a valid email address.',
            'product_enquiry.required' => 'Product enquiry is required.',
        ];
    }
}