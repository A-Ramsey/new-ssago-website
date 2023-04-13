<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function Create()
    {
        return view('auth.login');
    }

    public function Store()
    {
        $user = request()->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);

        if (auth()->attempt($user)) {
            return redirect()->route('home')->with('messages', "Login Successful");
        }

        throw ValidationException::withMessages(['email' => 'Email or password incorrect']);
    }

    public function delete()
    {
        auth()->logout();
        return redirect()->route('home')->with(['messages' => 'Logged out successfully']);
    }
}
