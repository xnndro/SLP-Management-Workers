<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplainSubmission extends Model
{
    use HasFactory;
    protected $table = 'complain_submissions';
    protected $fillable = [
        'assignment_id',
        'submission_description',
        'submission_img',
        'submission_feedback',
        'status_submission'
    ];
}
