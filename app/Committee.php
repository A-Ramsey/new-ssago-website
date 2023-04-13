<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Club;
use App\Role;
use App\Event;

class Committee extends Model
{
    const CLUB = 'Club';
    const EXEC = 'Executive Committee';
    const ASSISTANTS = 'Assistants';
    const TEAM_PINK = 'Team Pink';

    protected $fillable = [
        'name'
    ];

    //relationships

    public function club(): BelongsTo
    {
        return $this->BelongsTo(Club::class);
    }

    public function event(): BelongsTo
    {
        return $this->BelongsTo(Event::class);
    }

    public function roles(): HasMany
    {
        return $this->HasMany(Role::class);
    }
}
