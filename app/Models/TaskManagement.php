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
        'work_time',
        'place_id',
        'task_category_id',
        'task_status',
    ];
}
