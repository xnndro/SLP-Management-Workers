<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskSubmission extends Model
{
    use HasFactory;

    protected $table = 'task_submission';

    protected $fillable = [
        'task_management_id',
        'task_report',
        'task_comment',
        'task_status',
    ];

    public function task_management()
    {
        return $this->belongsTo(TaskManagement::class);
    }
}
