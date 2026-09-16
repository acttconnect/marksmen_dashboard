<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class JobApplicationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'job_opening_id' => [
                'required',
                'exists:job_openings,id',
            ],

            'full_name' => [
                'required',
                'string',
                'max:255',
            ],

            'mobile_number' => [
                'required',
                'string',
                'max:20',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'current_city' => [
                'required',
                'string',
                'max:255',
            ],

            'total_experience' => [
                'required',
                'string',
                'max:100',
            ],

            'highest_qualification' => [
                'nullable',
                'string',
                'max:255',
            ],

            'resume' => [
                'nullable',
                'file',
                'mimes:pdf,doc,docx',
                'max:5120',
            ],

            'brief_note' => [
                'nullable',
                'string',
            ],

            'status' => [
                'required',
                Rule::in([
                    'new',
                    'reviewed',
                    'shortlisted',
                    'rejected',
                ]),
            ],
        ];
    }
}