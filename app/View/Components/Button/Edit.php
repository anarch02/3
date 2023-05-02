<?php

namespace App\View\Components\Button;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Edit extends Component
{
    public $btn;
    public $id;
    /**
     * Create a new component instance.
     */
    public function __construct($btn, $id)
    {
        $this->btn = $btn; 
        $this->id = $id; 
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button.edit');
    }
}
