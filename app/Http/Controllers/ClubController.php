<?php

namespace App\Http\Controllers;

use App\Club;
use App\Committee;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('clubs.index', ['clubs' => Club::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clubs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $club = request()->validate([
            'name' => 'required|max:255|unique:clubs',
            'short_name' => 'required|max:255',
            'location' => 'required|max:255',
            'description' => 'required|max:2000',
            'email' => 'required|max:255|unique:clubs',
            'website' => 'required|max:255',
            'facebook' => 'required|max:255',
        ]);

        $createdClub = Club::create($club);

        $newCommittee = Committee::create();
        $newCommittee->club()->associate($createdClub);
        $newCommittee->save();

        return redirect()->route('clubs.show', ['id' => $createdClub->id])->with(['messages' => 'Club Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  Int $clubId
     * @return \Illuminate\Http\Response
     */
    public function show($clubId)
    {
        $club = Club::findOrFail($clubId);
        return view('clubs.show', ['club' => $club]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Int $clubId
     * @return \Illuminate\Http\Response
     */
    public function edit($clubId)
    {
        $club = Club::findOrFail($clubId);
        return view('clubs.edit', ['club' => $club]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Int $clubId
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $clubId)
    {
        $clubDetails = request()->validate([
            'name' => 'required|max:255',
            'short_name' => 'required|max:255',
            'location' => 'required|max:255',
            'description' => 'required|max:2000',
            'email' => 'required|max:255',
            'website' => 'required|max:255',
            'facebook' => 'required|max:255',
        ]);

        $club = Club::findOrFail($clubId);
        $club->update($clubDetails);
        return redirect()->route('clubs.show', ['id' => $club->id])->with(['messages' => 'Club details updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy($clubId)
    {
        $club = Club::find($clubId);
        $club->delete();
        return redirect()->route('clubs.index')->with(['messages' => 'Club deleted']);
    }
}
