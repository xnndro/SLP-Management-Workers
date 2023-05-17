<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComplainAssignment extends Model
{
    use HasFactory;
    protected $table = 'complain_assignments';
    protected $fillable = [
        'user_assign_id',
        'assign_description',
        'status_assign'
    ];
}
