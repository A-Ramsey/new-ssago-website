<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use App\User;
use App\Committee;

class RoleController extends Controller
{
    public static function returnLocation(Committee $committee, Array $message)
    {
        $club = $committee->club;
        // $message = ['messages' => 'Role set'];
        if ($club != null) {
            return redirect()->route('clubs.committee', ['id' => $club->id])->with($message);
        } elseif ($committee->name == Committee::EXEC) {
            return redirect()->route('team-pink')->with($message);
        } elseif ($committee->name == Committee::ASSISTANTS) {
            return redirect()->route('team-pink')->with($message);
        }

        //fix to go to the correct place
        return redirect()->route('home')->with($message);
    }

    public function setUserForm($committeeId, $roleId)
    {
        $role = Role::find($roleId);
        $committee = Committee::find($committeeId);
        $club = $committee->club;
        $users = User::pluck('id', 'name')->all();
        if ($club != null) {
            $users = [];
            $fullUsers = $club->users;
            foreach ($fullUsers as $user) {
                $users[$user->name] = $user->id;
            }
        }
        $users["No Member for Role"] = 0;
        return view('roles.set-user', ['role' => $role, 'committee' => $committee, 'users' => $users]);
    }

    public function setUser($committeeId, $roleId)
    {
        $formData = request()->validate([
            'user_id' => 'required'
        ]);
        $user = User::find($formData['user_id']);
        $role = Role::find($roleId);

        $role->user()->associate($user);
        $role->save();

        $committee = $role->committee;
        $message = ['messages' => 'Role set'];
        return RoleController::returnLocation($committee, ['messages' => 'Role set']);
    }

    public function edit($committeeId, $roleId)
    {
        $role = Role::find($roleId);
        $committee = Committee::find($committeeId);
        return view('roles.edit', ['committee' => $committee, 'role' => $role]);
    }

    public function update($committeeId, $roleId)
    {
        $role = Role::find($roleId);
        $committee = Committee::find($committeeId);
        $formData = request()->validate([
            'name' => 'required|max:255',
        ]);
        $role->update($formData);
        return RoleController::returnLocation($committee, ['messages' => 'Role Updated']);
    }
}
