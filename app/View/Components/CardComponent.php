<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CardComponent extends Component
{
    public $shadow;
    
    /**
     * Create a new component instance.
     */
    public function __construct($shadow = false)
    {
        $this->shadow = $shadow;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card-component');
    }
}
