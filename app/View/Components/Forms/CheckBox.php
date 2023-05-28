<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class CheckBox extends Component
{
    public $name;
    public $title;
    public $checked;
    public $isRequired;
    public $heading;
    public $isSwitch;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $name, $checked=false, $isRequired=false, $heading=False, $isSwitch=False)
    {
        $this->title = $title;
        $this->name = $name;
        $this->checked = $checked;
        $this->isRequired = $isRequired;
        $this->heading = $heading;
        $this->isSwitch = $isSwitch;
        if ($this->isSwitch && $this->checked == 1){
            $this->checked = 'on';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.check-box', [
            $this->title,
            $this->name,
            $this->checked,
            $this->isRequired,
            $this->heading,
            $this->isSwitch,
        ]);
    }
}
