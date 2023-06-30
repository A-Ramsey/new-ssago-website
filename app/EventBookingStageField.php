<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EventBookingStageField extends Model
{
    protected $fillable = [
        'name',
        'type',
        'required',
        'field_info',
    ];

    public function eventBookingStage()
    {
        return $this->belongsTo(EventBookingStage::class);
    }
}
