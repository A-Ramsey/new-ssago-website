<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class ClubCard extends Component
{
    public $club;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($club)
    {
        $this->club = $club;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.cards.club-card', [
            $this->club
        ]);
    }
}
