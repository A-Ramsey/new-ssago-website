<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Button extends Component
{
    public $name;
    public $title;
    public $isSubmit;
    public $isDanger;
    public $isDisabled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $title, $isSubmit=true, $isDanger=false, $isDisabled=false)
    {
        $this->name = $name;
        $this->title = $title;
        $this->isSubmit = $isSubmit;
        $this->isDanger = $isDanger;
        $this->isDisabled = $isDisabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.button', [
            $this->name,
            $this->title,
            $this->isSubmit,
            $this->isDanger,
            $this->isDisabled,
        ]);
    }
}
