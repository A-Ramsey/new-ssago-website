<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

use App\Club;
use App\Role;
use App\Committee;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //setting attributes

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    //setting relationships

    public function club(): BelongsTo
    {
        return $this->belongsTo(Club::class);
    }

    public function roles(): HasMany
    {
        return $this->hasMany(Role::class);
    }

    //methods

    public function isExec() 
    {
        $roles = $this->roles;
        foreach ($roles as $role) {
            $committee = $role->committee;
            if ($committee->name == Committee::EXEC){
                return true;
            }
        }
        return false;
    }

    public function isAssistant()
    {
        $roles = $this->roles;
        foreach ($roles as $role) {
            $committee = $role->committee;
            if ($committee->name == Committee::ASSISTANTS){
                return true;
            }
        }
        return false;
    }

    public function isTeamPink()
    {
        return ($this->isExec() || $this->isAssistant());
    }

    public function getCommitteeClubs($idOnly = false)
    {
        $clubs = [];
        foreach ($this->roles as $role) {
            $club = $role->committee()->club;
            if ($club == null) {
                continue;
            }
            if ($idOnly) {
                array_push($clubs, $club->id);
            } else {
                array_push($clubs, $club);
            }
        }
        return $clubs;
    }
    
    public function getCommitteeEvents($idOnly = false)
    {
        $events = [];
        foreach ($this->roles as $role) {
            $event = $role->committee()->event;
            if ($event == null) {
                continue;
            }
            if ($idOnly) {
                array_push($events, $event->id);
            } else {
                array_push($events, $event);
            }
        }
        return $events;
    }

    public function isClubCommittee($clubId)
    {
        foreach ($this->getCommitteeClubs() as $club){
            if ($club->id == $clubId) {
                return true;
            }
        }
        return false;
    }

    public function isEventCommittee($eventId)
    {
        foreach ($this->getCommitteeEvents() as $event){
            if ($event->id == $eventId) {
                return true;
            }
        }
        return false;
    }

    public function getCommittees($idOnly = false)
    {
        $committees = [];
        foreach ($this->roles as $role) {
            $committee = $role->committee;
            if ($idOnly) {
                array_push($committees, $committee->id);
            } else {
                array_push($committees, $committee);
            }
        }
        return $committees;
    }
}
