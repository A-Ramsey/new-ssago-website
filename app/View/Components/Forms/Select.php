<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Select extends Component
{
    public $name;
    public $title;
    public $items; //list of ids and value
    public $isRequired;
    public $selected;
    public $isDisabled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $title, $items, $isRequired=false, $selected=-1, $isDisabled=false)
    {
        $this->name = $name;
        $this->title = $title;
        $this->items = $items;
        $this->isRequired = $isRequired;
        $this->selected = $selected;
        $this->isDisabled = $isDisabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.select', [
            $this->name,
            $this->title,
            $this->items,
            $this->isRequired,
            $this->selected,
            $this->isDisabled,
        ]);
    }
}
