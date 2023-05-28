<?php

namespace App\View\Components;

use Illuminate\View\Component;

class EventPageMenu extends Component
{
    public $event;
    public $eventPages;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event = $event;
        $this->eventPages = $event->eventPageMenu();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.event-page-menu', [
            'event' => $this->event,
            'eventPages' => $this->eventPages,
        ]);
    }
}
