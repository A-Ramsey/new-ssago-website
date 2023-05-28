<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Event;

class EventPage extends Model
{
    protected $fillable = ['title', 'content', 'menu_title', 'display_in_menu', 'order_in_menu'];

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
