<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\EventBookingStageTypeEnum;
use App\Event;

class EventBookingStage extends Model
{
    protected $casts = [
        'type' => EventBookingStageTypeEnum::class,
    ];

    protected $fillable = [
        'name',
        'type',
    ];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function eventBookingStageFields(): HasMany
    {
        return $this->hasMany(EventBookingStageField::class);
    }
}
