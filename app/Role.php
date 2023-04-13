<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Committee;
use App\User;

class Role extends Model
{
    protected $fillable = [
        'name'
    ];

    //relationships

    public function committee(): BelongsTo
    {
        return $this->BelongsTo(Committee::class);
    }

    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }
}
