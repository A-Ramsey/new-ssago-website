<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EventBookingStagesDisplay extends Component
{
    public $event;
    public $eventBookingStages;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event = $event;
        $this->eventBookingStages = $event->eventBookingStages()->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.event-booking-stages-display', [
            'event' => $this->event,
            'eventBookingStages' => $this->eventBookingStages,
        ]);
    }
}
