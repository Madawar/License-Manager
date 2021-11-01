<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Password extends Component
{
    public $label;
    public $placeholder;
    public $name;
    public $value;
    public $model;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $placeholder)
    {
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;



    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.password');
    }
}
