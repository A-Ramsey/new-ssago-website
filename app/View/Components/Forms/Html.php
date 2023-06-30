<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Html extends Component
{
    public $name;
    public $title;
    public $value;
    public $isRequired;
    public $isDisabled;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $title, $value = "", $isRequired=false, $isDisabled=false)
    {
        $this->name = $name;
        $this->title = $title;
        $this->value = $value;
        $this->isRequired = $isRequired;
        $this->isDisabled = $isDisabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.html', [
            $this->name,
            $this->title,
            $this->value,
            $this->isRequired,
            $this->isDisabled,
        ]);
    }
}
