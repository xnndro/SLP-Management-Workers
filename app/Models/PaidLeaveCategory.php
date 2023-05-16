<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaidLeaveCategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function paidLeaveRequest(){
        return $this->hasMany(PaidLeaveRequest::class);
    }
}
