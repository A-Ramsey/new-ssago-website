<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class CardList extends Component
{
    public $justifyContent;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($justifyContent = 'center')
    {
        $this->justifyContent = $justifyContent;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.cards.card-list', [
            'justifyContent' => $this->justifyContent,
        ]);
    }
}
