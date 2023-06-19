<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\ComplainAssignment;

class ComplainSubmission extends Model
{
    use HasFactory;

    protected $table = 'complain_submissions';

    protected $fillable = [
        'assignment_id',
        'submission_description',
        'submission_img',
        'submission_feedback',
        'status_submission',
    ];

    public function asssignment() : BelongsTo
    {
        return $this->belongsTo(ComplainAssignment::class);
    }

    public function submission_status() : BelongsTo
    {
        return $this->belongsTo(SubmissionStatus::class, 'submission_status');
    }
}
