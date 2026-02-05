<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'avg_time',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',
        ];
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    /** Average duration formatted (e.g. "45 min"). */
    public function getFormattedAvgTimeAttribute(): string
    {
        if ($this->avg_time < 60) {
            return $this->avg_time . ' min';
        }
        $hours = (int) floor($this->avg_time / 60);
        $mins = $this->avg_time % 60;
        return $mins > 0 ? "{$hours}h {$mins}min" : "{$hours}h";
    }
}
