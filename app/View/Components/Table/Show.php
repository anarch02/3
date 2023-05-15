<?php

namespace App\View\Components\Table;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Show extends Component
{
    // public $info;
    public $array;


    public function __construct($array)
    {
        // $this->info = $info;
        $this->array = $array;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table.show');
    }
}
