<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskManagement extends Model
{
    use HasFactory;

    protected $table = 'task_management';

    protected $fillable = [
        'user_id',
        'work_date',
        'place_id',
        'task_category_id',
        'task_status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function place()
    {
        return $this->belongsTo(Place::class);
    }

    public function task_category()
    {
        return $this->belongsTo(TaskCategory::class);
    }
}
