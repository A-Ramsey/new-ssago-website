<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Hidden extends Component
{
    public $key;
    public $value;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($key, $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.hidden', [
            $this->key,
            $this->value,
        ]);
    }
}
