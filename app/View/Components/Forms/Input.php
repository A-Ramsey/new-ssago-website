<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Input extends Component
{
    public $name;
    public $title;
    public $value;
    public $isPassword;
    public $isRequired;
    public $isDisabled;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $title, $value = "", $isPassword=false, $isRequired=false, $isDisabled=false)
    {
        $this->name = $name;
        $this->title = $title;
        $this->value = $value;
        $this->isPassword = $isPassword;
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
        return view('components.forms.input', [
            $this->name,
            $this->title,
            $this->value,
            $this->isPassword,
            $this->isRequired,
            $this->isDisabled,
        ]);
    }
}
