<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use App\Club;
use App\Role;
use App\Event;
use App\Committee;
use App\Http\Controllers\RoleController;

class CommitteeController extends Controller
{
    private function getClubCommittee(Club $club)
    {
        $committee = $club->committee;
        if ($committee == null) {
            $newCommittee = Committee::create();
            $newCommittee->club()->associate($club);
            $newCommittee->save();
            $committee = $club->committee;
        }
        return $committee;
    }

    private function getEventCommittee(Event $event)
    {
        $committee = $event->committee;
        if ($committee == null) {
            $newCommittee = Committee::create();
            $newCommittee->event()->associate($event);
            $newCommittee->save();
            $committee = $event->committee;
        }
        return $committee;
    }

    public function showClubCommittee($clubId)
    {
        $club = Club::find($clubId);
        $committee = $this->getClubCommittee($club);
        
        return view('committees.show-club-committee', ['club' => $club, 'committee' => $committee]);
    }

    public function showEventCommittee($eventId)
    {
        $event = Event::find($eventId);
        $committee = $this->getEventCommittee($event);

        return view('committees.show-event-committee', ['event' => $event, 'committee' => $committee]);
    }

    public function addRole($committeeId)
    {
        $formData = request()->validate([
            'name' => 'required|max:255',
        ]);
        $committee = Committee::find($committeeId);

        foreach($committee->roles as $role) {
            if ($role->name == $formData['name']) {
                throw ValidationException::withMessages(['name' => 'Role name already exists']);
            }
        }
        
        $committee->roles()->create([
            'name' => $formData['name'],
        ]);

        $message = ['messages' => 'Role added'];
        return RoleController::returnLocation($committee, $message);
    }

    public function removeRole($committeeId, $roleId)
    {
        $committee = Committee::find($committeeId);
        $role = Role::find($roleId);
        $role->committee()->dissociate();
        $role->save();
        $role->delete();
        
        $message = ['messages' => 'Role removed'];
        return RoleController::returnLocation($committee, $message);
    }
}
