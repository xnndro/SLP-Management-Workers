<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScheduleForm extends Model
{
    use HasFactory;

    protected $table = 'schedule_forms';

    protected $fillable = [
        'form_month',
        'form_file',
    ];
}
