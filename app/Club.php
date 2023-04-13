<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

use App\User;
use App\Committee;

class Club extends Model
{
    protected $fillable = [
        'name', 'short_name', 'location', 'description', 'email', 'website', 'facebook'
    ];

    //relationships

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }
    
    public function committee(): HasOne
    {
        return $this->HasOne(Committee::class);
    }
}
