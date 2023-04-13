<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Committee;

class CommitteeTable extends Component
{
    public $committee;
    public $permission;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($committee)
    {
        $this->committee = $committee;
        $this->permission = 'on_committee';
        if ($committee->name == Committee::EXEC) {
            $this->permission = 'exec';
        } elseif ($committee->name == Committee::ASSISTANTS) {
            $this->permission = 'team_pink';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.committee-table', [
            $this->committee,
            $this->permission,
        ]);
    }
}
