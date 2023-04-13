<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class TextArea extends Component
{
    public $name;
    public $title;
    public $value;
    public $isRequired;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $title, $value = "", $isRequired=false)
    {
        $this->name = $name;
        $this->title = $title;
        $this->value = $value;
        $this->isRequired = $isRequired;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.text-area', [
            $this->name,
            $this->title,
            $this->value,
            $this->isRequired,
        ]);
    }
}
