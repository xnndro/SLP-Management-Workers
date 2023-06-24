<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'role_name',
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function inventaris()
    {
        return $this->hasMany(Inventaris::class);
    }
}
