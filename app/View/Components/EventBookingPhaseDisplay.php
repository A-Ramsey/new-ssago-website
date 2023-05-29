<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EventBookingPhaseDisplay extends Component
{
    public $event;
    public $eventBookingPhases;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event = $event;
        $this->eventBookingPhases = $event->eventBookingPhases;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.event-booking-phase-display', [
            'event' => $this->event,
            'eventBookingPhases' => $this->eventBookingPhases,
        ]);
    }
}
