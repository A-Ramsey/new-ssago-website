<?php

namespace App\View\Components\Bookings;

use Illuminate\View\Component;
use App\EventBookingStageField;

class FormItem extends Component
{
    public $field;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(EventBookingStageField $field)
    {
        $this->field = $field;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.bookings.form-item', 
            [
                'field' => $this->field,
            ]);
    }
}
