<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\User;
use App\Club;

class UserController extends Controller
{
    public function create()
    {
        $clubs = Club::pluck('id', 'name')->all();
        return view('users.create', ['clubs' => $clubs]);
    }

    public function store()
    {
        $formData = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:7|max:255',
            'repeat-password' => 'required|min:7|max:255'
        ]);
        if($formData['password'] != $formData['repeat-password']) {
            throw ValidationException::withMessages(['repeat-password' => 'Passwords Must Match']);
        }
        unset($formData['repeat-password']);
        $user = User::create($formData);

        $clubs = implode(Club::pluck('id')->all(), ',');
        $linkedObjs = request()->validate([
            'club' => "required|not_in:0|in:{$clubs}"
        ]);
        $club = Club::find($linkedObjs['club']);
        $user->club()->associate($club);
        $user->save();

        auth()->login($user);
        return redirect()->route('home')->with(['messages' => 'Account created']);
    }

    public function dashboard()
    {
        return view('users.dashboard');
    }

    public function edit()
    {
        return view('users.edit');
    }

    public function update()
    {
        $formData = request()->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);
        auth()->user()->update($formData);
        return redirect()->route('dashboard')->with(['messages' => 'Details Updated']);
    }

    public function confirmDelete()
    {
        return view('users.delete');
    }

    public function delete()
    {
        $user = auth()->user();
        auth()->logout();
        $user->delete();
        return redirect()->route('home')->with(['messages' => 'Account deleted']);
    }
}
