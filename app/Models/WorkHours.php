<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WorkHours extends Model
{
    protected $table = 'work_hours';

    protected $fillable = [
        'user_id',
        'start_time',
        'end_time',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Check if a given datetime is within this work window (time between start and end).
     * end_time is exclusive (e.g. 16:00 means up to but not including 16:00).
     */
    public function containsTime(\DateTimeInterface $datetime): bool
    {
        $t = \Carbon\Carbon::parse($datetime)->format('H:i');
        $start = \Carbon\Carbon::parse($this->start_time)->format('H:i');
        $end = \Carbon\Carbon::parse($this->end_time)->format('H:i');
        return $t >= $start && $t < $end;
    }
}
