<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class InputWrapper extends Component
{
    public $name;
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $title)
    {
        $this->name = $name;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.input-wrapper', [
            $this->name,
            $this->title,
        ]);
    }
}
