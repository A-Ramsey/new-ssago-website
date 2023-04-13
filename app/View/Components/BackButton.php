<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BackButton extends Component
{
    public $title;
    public $link;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $link)
    {
        $this->title = $title;
        $this->link = $link;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.back-button', [
            $this->title,
            $this->link,
        ]);
    }
}
