<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $table = 'inventaris';

    protected $fillable = [
        'inventaris_name',
        'inventaris_image',
        'inventaris_description',
        'inventaris_total',
        'inventaris_role_id'
    ];
    
    public function role(){
        return $this->belongsTo(InventarisRole::class);
    }
}
