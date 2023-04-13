<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class EventCard extends Component
{
    public $event;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event = $event;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.cards.event-card', [
            $this->event
        ]);
    }
}
