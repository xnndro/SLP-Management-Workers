<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventarisRole extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function inventories(){
        return $this->hasMany(Inventaris::class);
    }
    public function panduans(){
        return $this->hasMany(Panduan::class);
    }
}
