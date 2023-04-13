<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Event;
use App\Committee;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return view('events.index', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = request()->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:2000',
            'location' => 'required|max:255',
            'post_code' => 'max:255',
            'start' => 'required|date|after:today',
            'end' => 'required|date|after:today',
            'attendees_limit' => 'max:255',
        ]);

        $event = Event::create($formData);

        $newCommittee = Committee::create();
        $newCommittee->event()->associate($event);
        $newCommittee->save();
        $newCommittee->roles()->create([
            'name' => 'creator',
        ]);

        $role = $newCommittee->roles()->where('name', 'creator')->first();
        $role->user()->associate(auth()->user());
        $role->save();

        return redirect()->route('events.index')->with(['messages' => 'Event Created'])->with(['messages' => 'Event Created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($eventId)
    {
        $event = Event::find($eventId);
        return view('events.show', ['event'=> $event]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($eventId)
    {
        $event = Event::find($eventId);

        return view('events.edit', ['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $eventId)
    {
        $formData = request()->validate([
            'name' => 'required|max:255',
            'description' => 'required|max:2000',
            'location' => 'required|max:255',
            'post_code' => 'max:255',
            'start' => 'required|date|after:today',
            'end' => 'required|date|after:today',
            'attendees_limit' => 'max:255',
        ]);
        
        $event = Event::find($eventId);
        $event->update($formData);

        return redirect()->route('events.show', ['eventId' => $eventId])->with(['messages' => "Event Updated"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($eventId)
    {
        $event = Event::find($eventId);

        $event->delete();
        return redirect()->route('events.index')->with(['messages' => 'Event Deleted']);
    }
}
