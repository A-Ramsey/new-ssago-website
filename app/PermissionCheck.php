<?php

namespace App;

use App\Club;
use App\Role;
use App\Event;
use App\Committee;

class PermissionCheck
{
    public static function club($clubId)
    {
        if ($clubId == null) {
            return false;
        } elseif (auth()->user()->isTeamPink()) {
            return true;
        } elseif (auth()->user()->isClubCommittee($clubId)) {
            return true;
        }
        
        return false;
    }

    public static function event($eventId)
    {
        if ($eventId == null) {
            return false;
        } elseif (auth()->user()->isTeamPink()) {
            return true;
        } elseif (auth()->user()->isEventCommittee($eventId)) {
            return true;
        }
        return false;
    }

    public static function exec()
    {
        return auth()->user()->isExec();
    }

    public static function assistant()
    {
        return auth()->user()->isAssistant();
    }

    public static function teamPink()
    {
        return auth()->user()->isTeamPink();
    }

    public static function onCommittee($committeeId)
    {
        $userCommittees = auth()->user()->getCommittees($idOnly = true);
        return in_array($committeeId, $userCommittees);
    }
}