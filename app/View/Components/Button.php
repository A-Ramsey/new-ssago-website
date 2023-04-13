<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $link;
    public $title;
    public $isDanger;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($link, $title, $isDanger = false)
    {
        $this->link = $link;
        $this->title = $title;
        $this->isDanger = $isDanger;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.button', [
            $this->link,
            $this->title,
            $this->isDanger,
        ]);
    }
}
