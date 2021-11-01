<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class Radio extends Component
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
    public function __construct($label, $name,  $value,$model)
    {
        $this->label = $label;
        $this->name = $name;
        $this->model= $model;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.forms.radio');
    }
}
