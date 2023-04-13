<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;

class MembershipController extends Controller
{
    public function joinConfirm($clubId)
    {
        $club = Club::find($clubId);
        return view('membership.join', ['club' => $club]);
    }

    public function join($clubId)
    {
        $club = Club::find($clubId);
        auth()->user()->club()->associate($club);
        auth()->user()->save();
        return redirect()->route('clubs.show', ['id' => $clubId])->with(['messages' => "Your are now a member of {$club->name}"]);
    }

    public function clubList($clubId)
    {
        $club = Club::find($clubId);

        $members = $club->users;
        return view('membership.club_list', ['club' => $club, 'members' => $members]);
    }
}
