<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ComplainAssignment extends Model
{
    use HasFactory;

    protected $table = 'complain_assignments';

    protected $fillable = [
        'user_assign_id',
        'assign_description',
        'status_assign',
    ];

    public function complain(): BelongsTo
    {
        return $this->belongsTo(Complain::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function declines(): HasMany
    {
        return $this->hasMany(ComplainDecline::class);
    }

    public function submissions(): HasOne
    {
        return $this->hasOne(ComplainSubmission::class);
    }

    public function assign_status(): BelongsTo
    {
        return $this->belongsTo(AssignStatus::class, 'assign_status');
    }
}
