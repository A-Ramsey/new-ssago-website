<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventBookingPhase;
use App\Event;

use Illuminate\Validation\ValidationException;

class EventBookingPhaseController extends Controller
{
    public function create($eventId)
    {
        $event = Event::findOrFail($eventId);
        return view('event-booking-phases.create', [
            'event' => $event,
        ]);
    }

    public function store(Request $request)
    {
        $eventBookingPhase = request()->validate([
            'title' => 'required|max:255',
            'start' => 'required|date',
            'end' => 'required|date',
            'cost' => 'required|numeric',
            'event_id' => 'required|integer',
        ]);

        $event = Event::find($eventBookingPhase['event_id']);
        unset($eventBookingPhase['event_id']);

        $checkStart = strtotime($eventBookingPhase['start']);
        $checkEnd = strtotime($eventBookingPhase['end']);
        foreach($event->eventBookingPhases as $eventBookingPhaseTmp){
            $checkEventStart = strtotime($eventBookingPhaseTmp->start);
            $checkEventEnd = strtotime($eventBookingPhaseTmp->end);
            if ($eventBookingPhaseTmp->title == $eventBookingPhase['title']){
                throw ValidationException::withMessages(['title' => 'Booking Phase with that title already exists']);
            }
            
            if (($checkEventStart < $checkStart && $checkStart < $checkEventEnd) ||
                ($checkEventStart == $checkStart || $checkStart == $checkEventEnd)
                ){
                throw ValidationException::withMessages(['start' => 'Booking Phase start date must not be between other phase start and end dates']);
            } else if (($checkEventStart <= $checkEnd && $checkEnd <= $checkEventEnd) ||
                ($checkEventStart == $checkEnd || $checkEnd == $checkEventEnd)
                ){
                throw ValidationException::withMessages(['end' => 'Booking Phase end date must not be between other phase start and end dates']);
            }
        }

        $createdEventBookingPhase = EventBookingPhase::create($eventBookingPhase);

        $createdEventBookingPhase->event()->associate($event);
        $createdEventBookingPhase->save();
        return redirect()->route('events.show', ['eventId' => $event->id])->with(['messages' => 'Event Booking Phase Created']);
    }

    public function edit($eventId, $eventBookingPhaseId)
    {
        $eventBookingPhase = EventBookingPhase::findOrFail($eventBookingPhaseId);
        $event = Event::findOrFail($eventId);
        return view('event-booking-phases.edit', [
            'event' => $event,
            'eventBookingPhase' => $eventBookingPhase,
        ]);
    }

    public function update($eventId, $eventBookingPhaseId)
    {
        $eventBookingPhase = request()->validate([
            'title' => 'required|max:255',
            'start' => 'required|date',
            'end' => 'required|date',
            'cost' => 'required|numeric',
        ]);

        $event = Event::findOrFail($eventId);

        $checkStart = strtotime($eventBookingPhase['start']);
        $checkEnd = strtotime($eventBookingPhase['end']);
        foreach($event->eventBookingPhases as $eventBookingPhaseTmp){
            if ($eventBookingPhaseTmp->id == $eventBookingPhaseId){
                continue;
            }
            $checkEventStart = strtotime($eventBookingPhaseTmp->start);
            $checkEventEnd = strtotime($eventBookingPhaseTmp->end);
            if ($eventBookingPhaseTmp->title == $eventBookingPhase['title']){
                throw ValidationException::withMessages(['title' => 'Booking Phase with that title already exists']);
            }
            
            if (($checkEventStart < $checkStart && $checkStart < $checkEventEnd) ||
                ($checkEventStart == $checkStart || $checkStart == $checkEventEnd)
                ){
                throw ValidationException::withMessages(['start' => 'Booking Phase start date must not be between other phase start and end dates']);
            } else if (($checkEventStart <= $checkEnd && $checkEnd <= $checkEventEnd) ||
                ($checkEventStart == $checkEnd || $checkEnd == $checkEventEnd)
                ){
                throw ValidationException::withMessages(['end' => 'Booking Phase end date must not be between other phase start and end dates']);
            }
        }

        $updatedEventBookingPhase = EventBookingPhase::findOrFail($eventBookingPhaseId);
        $updatedEventBookingPhase->update($eventBookingPhase);

        return redirect()->route('events.show', ['eventId' => $eventId])->with(['messages' => 'Event Booking Phase Updated']);
    }

    public function destroy($eventId, $eventBookingPhaseId)
    {
        $eventBookingPhase = EventBookingPhase::findOrFail($eventBookingPhaseId);
        $eventBookingPhase->delete();
        return redirect()->route('events.show', ['eventId' => $eventId])->with(['messages' => 'Event Booking Phase Deleted']);
    }
}
