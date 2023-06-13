<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskCategory extends Model
{
    use HasFactory;

    protected $table = 'task_category';

    protected $fillable = [
        'task_category_name',
        'panduan_id',
    ];
}
