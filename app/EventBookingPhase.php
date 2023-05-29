<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Event;

class EventBookingPhase extends Model
{
    protected $fillable = [
        'title', 'start', 'end', 'cost',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
