<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\Committee;

class Event extends Model
{
    protected $fillable = [
        'name', 'description', 'location', 'post_code', 'start', 'end', 'attendees_limit'
    ];

    public function committee(): HasOne
    {
        return $this->hasOne(Committee::class);
    }
}
