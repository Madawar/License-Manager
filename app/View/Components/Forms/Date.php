<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Date extends Component
{
    public $options;
    public $label;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label,$options)
    {
        $this->options = $options;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.date');
    }
}
