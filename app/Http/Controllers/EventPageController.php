<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\EventPage;
use App\Event;

class EventPageController extends Controller
{
    public function index(Int $eventId)
    {
        $event = Event::findOrFail($eventId);
        return view('event-pages.index', [
            "event" => $event
        ]);
    }

    public function create(Int $eventId)
    {
        $event = Event::findOrFail($eventId);
        return view('event-pages.create', [
            "event" => $event
        ]);
    }

    public function store(Request $request)
    {
        $eventPage = request()->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:2000',
            'menu_title' => 'required|max:255',
            'display_in_menu' => 'required', // TODO: Make so checkbox doesn't have to be checked
            'order_in_menu' => 'int',
            'event_id' => 'required|integer',
        ]);
        if ($eventPage['display_in_menu'] == 'on') {
            $eventPage['display_in_menu'] = true;
        } else {
            $eventPage['display_in_menu'] = false;
        }

        $event = Event::find($eventPage['event_id']);
        unset($eventPage['event_id']);

        foreach($event->eventPages as $page){
            if ($page->title == $eventPage['title']){
                throw ValidationException::withMessages(['title' => 'Page with that title already exists']);
            }
        }

        $createdEventPage = EventPage::create($eventPage);

        $createdEventPage->event()->associate($event);
        $createdEventPage->save();
        return redirect()->route('event-pages.index', ['eventId' => $event->id])->with(['messages' => 'Event Page Created']);
    }

    public function show($eventId, $eventPageId)
    {
        $eventPage = EventPage::find($eventPageId);
        $event = Event::find($eventId);
        return view('event-pages.show', ['event' => $event, 'eventPage' => $eventPage]);
    }

    public function edit($eventId, $eventPageId)
    {
        $eventPage = EventPage::find($eventPageId);
        $event = Event::find($eventId);

        return view('event-pages.edit', ['event' => $event, 'eventPage' => $eventPage]);
    }

    public function update($eventId, $eventPageId)
    {
        $eventPage = request()->validate([
            'title' => 'required|max:255',
            'content' => 'required|max:2000',
            'menu_title' => 'required|max:255',
            'display_in_menu' => 'required', // TODO: Make so checkbox doesn't have to be checked
            'order_in_menu' => 'int',
            'event_id' => 'required|integer',
        ]);
        if ($eventPage['display_in_menu'] == 'on') {
            $eventPage['display_in_menu'] = true;
        } else {
            $eventPage['display_in_menu'] = false;
        }

        $event = Event::find($eventId);
        unset($eventPage['event_id']);

        foreach($event->eventPages as $page){
            if ($page->id == $eventPageId){
                continue;
            }
            if ($page->title == $eventPage['title'] && $page->id != $eventPageId){
                throw ValidationException::withMessages(['title' => 'Page with that title already exists']);
            }
        }

        $updatedEventPage = EventPage::find($eventPageId);
        $updatedEventPage->update($eventPage);

        return redirect()->route('event-pages.index', ['eventId' => $event->id])->with(['messages' => 'Event Page Updated']);
    }

    public function destroy($eventId, $eventPageId)
    {
        $eventPage = EventPage::find($eventPageId);
        $eventPage->delete();
        return redirect()->route('event-pages.index', ['eventId' => $eventId])->with(['messages' => 'Event Page Deleted']);
    }
}
