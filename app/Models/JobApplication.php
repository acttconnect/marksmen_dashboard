<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_opening_id',
        'full_name',
        'mobile_number',
        'email',
        'current_city',
        'total_experience',
        'highest_qualification',
        'resume_path',
        'brief_note',
        'status',
    ];

    public function jobOpening()
    {
        return $this->belongsTo(
            JobOpening::class,
            'job_opening_id',
            'id'
        );
    }
}