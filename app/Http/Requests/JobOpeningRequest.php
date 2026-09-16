<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JobOpeningRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => [
    'required',
    'string',
    'max:255',
],

            'department' => [
                'required',
                'string',
                'max:255',
            ],

            'employment_type' => [
                'required',
                'string',
                'max:100',
            ],

            'location' => [
                'required',
                'string',
                'max:255',
            ],

            'experience' => [
                'required',
                'string',
                'max:100',
            ],

            'open_positions' => [
                'required',
                'integer',
                'min:1',
            ],

            'job_description' => [
    'required',
    'string',
],

            'skills' => [
                'nullable',
                'array',
            ],

            'skills.*' => [
                'nullable',
                'string',
                'max:100',
            ],

            'qualification' => [
                'nullable',
                'string',
                'max:500',
            ],

            'responsibilities' => [
                'nullable',
                'string',
            ],

            'requirements' => [
                'nullable',
                'string',
            ],

            'status' => [
                'required',
                Rule::in([
                    'open',
                    'closed',
                    'draft',
                ]),
            ],

            'application_deadline' => [
                'nullable',
                'date',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Job title is required.',
            'department.required' => 'Department is required.',
            'employment_type.required' => 'Employment type is required.',
            'location.required' => 'Location is required.',
            'experience.required' => 'Experience is required.',
            'open_positions.required' => 'Open positions is required.',
            'open_positions.integer' => 'Open positions must be a number.',
            'open_positions.min' => 'Open positions must be at least 1.',
            'job_description.required' => 'Job description is required.',
            'skills.array' => 'Skills must be provided as a list.',
            'status.required' => 'Please select job status.',
            'status.in' => 'Invalid job status selected.',
            'application_deadline.date' => 'Please enter a valid deadline.',
        ];
    }
}