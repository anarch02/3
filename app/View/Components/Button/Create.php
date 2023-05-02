<?php

namespace App\View\Components\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Create extends Component
{
    public $btn;
    /**
     * Create a new component instance.
     */
    public function __construct($btn)
    {
        $this->btn = $btn; 
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button.create');
    }
}
