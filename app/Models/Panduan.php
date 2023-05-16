<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panduan extends Model
{
    use HasFactory;
    protected $table = 'panduans';
    protected $fillable = [
        'panduan_title',
        'workers_role',
        'panduan_content'
    ];
}
