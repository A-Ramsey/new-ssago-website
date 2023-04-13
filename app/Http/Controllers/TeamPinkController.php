<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Committee;

class TeamPinkController extends Controller
{
    public function index()
    {
        $exec = Committee::where('name', '=', Committee::EXEC)->get()->first();
        $assistants = Committee::where('name', '=', Committee::ASSISTANTS)->get()->first();
        if ($exec == null) {
            $exec = Committee::create(['name' => Committee::EXEC]);
        }
        if ($assistants == null) {
            $assistants = Committee::create(['name' => Committee::ASSISTANTS]);
        }
        
        return view('team-pink.index', ['exec' => $exec, 'assistants' => $assistants]);
    }
}
