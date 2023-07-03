<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'status_report',
    ];

    public function latestAssigned(): HasOne
    {
        return $this->hasOne(ComplainAssignment::class)->latestOfMany();
    }

    public function submission(): HasOne
    {
        return $this->hasOne(ComplainSubmission::class)->latestOfMany();
    }

    public function place(): BelongsTo
    {
        return $this->belongsTo(Place::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(ComplainCategory::class, 'complain_category');
    }

    public function urgency(): BelongsTo
    {
        return $this->belongsTo(ComplainUrgency::class, 'complain_urgency');
    }

    public function status(): BelongsTo
    {
        return $this->belongsTo(ReportStatus::class, 'report_status');
    }
}
