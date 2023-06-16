<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panduan extends Model
{
    use HasFactory;
    protected $table = 'panduan';
    protected $fillable = [
        'panduan_title',
        'panduan_content',
        'panduan_role',
        'panduan_image',
        'inventaris_role_id',
    ];

    public function role(){
        $this->belongsTo(InventarisRole::class);
    }
}
