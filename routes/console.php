<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

use App\Committee;
use App\User;
use App\Role;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('make-exec', function () {
    $email = $this->ask('Email of user to make exec');
    $user = User::where('email', '=', $email)->get()->first();
    $exec = Committee::where('name', '=', Committee::EXEC)->get()->first();
    if ($exec == null) {
        $exec = Committee::create(['name' => Committee::EXEC]);
    }
    $exec->roles()->create([
        'name' => "temporary",
    ]);
    $role = Role::where('name', '=', 'temporary')->get()->first();
    $role->user()->associate($user);
    $role->save();

    $this->comment("Exec permissions added to user with $email");
});
