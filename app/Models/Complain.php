<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;
    protected $table = 'complains';
    protected $fillable = [
        'user_report_id',
        'place_id',
        'complain_title',
        'complain_description',
        'complain_category',
        'complain_urgency',
        'status_report'
    ];
}
