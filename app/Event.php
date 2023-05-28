<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Committee;
use App\EventPage;

class Event extends Model
{
    protected $fillable = [
        'name', 'description', 'location', 'post_code', 'start', 'end', 'attendees_limit'
    ];

    public function committee(): HasOne
    {
        return $this->hasOne(Committee::class);
    }

    public function eventPages(): HasMany
    {
        return $this->hasMany(EventPage::class);
    }

    public function eventPageMenu()
    {
        return $this->eventPages()->where('display_in_menu', true)->orderBy('order_in_menu')->get();
    }
}
