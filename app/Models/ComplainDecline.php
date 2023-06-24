<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ComplainDecline extends Model
{
    use HasFactory;

    protected $table = 'complain_declines';

    protected $fillable = [
        'assignment_id',
        'decline_description',
    ];

    public function asssignment(): BelongsTo
    {
        return $this->belongsTo(ComplainAssignment::class);
    }
}
