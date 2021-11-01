<?php

namespace App\View\Components\Forms;

use Illuminate\View\Component;

class TSelect extends Component
{
    public $label;
    public $placeholder;
    public $name;
    public $options;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $placeholder, $options)
    {
        $this->label = $label;
        $this->name = $name;
        $this->placeholder = $placeholder;
        $this->options = $options;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.forms.t-select');
    }
}
