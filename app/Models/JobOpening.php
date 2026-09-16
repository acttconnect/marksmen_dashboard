<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobOpening extends Model
{
    protected $fillable = [
        'title',
        'department',
        'employment_type',
        'location',
        'experience',
        'open_positions',
        'job_description',
        'skills',
        'qualification',
        'responsibilities',
        'requirements',
        'status',
        'application_deadline',
    ];

    protected $casts = [
        'skills' => 'array',
        'application_deadline' => 'date',
    ];
}