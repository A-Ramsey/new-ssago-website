<?php

namespace App\View\Components\Tables;

use Illuminate\View\Component;

class Table extends Component
{
    public $headers;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($headers = [])
    {
        $this->headers = $headers;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.tables.table', [
            $this->headers,
        ]);
    }
}
