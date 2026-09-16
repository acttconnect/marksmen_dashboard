<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductEnquiryRequest extends FormRequest
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

            'project_location' => [
                'required',
                'string',
                'max:255',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'product_portfolio' => [
                'required',
                'string',
                'max:255',
            ],

            'requirements' => [
                'nullable',
                'string',
            ],

            'status' => [
                'required',
                Rule::in([
                    'new',
                    'contacted',
                    'closed',
                ]),
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Name is required.',
            'mobile_number.required' => 'Mobile number is required.',
            'project_location.required' => 'Project location is required.',
            'email.email' => 'Please enter a valid email address.',
            'product_portfolio.required' => 'Product portfolio is required.',
            'status.required' => 'Please select enquiry status.',
            'status.in' => 'Invalid enquiry status selected.',
        ];
    }
}