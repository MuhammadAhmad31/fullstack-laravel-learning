<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DataTable extends Component
{
    public $headers;
    public $items;
    public $creatable;
    public $editable;
    public $deletable;
    public $createRoute;
    public $editRoute;
    public $deleteRoute;
    public $formatters;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $headers = [], 
        $items = [],
        $creatable = false,
        $editable = false,
        $deletable = false,
        $createRoute = '',
        $editRoute = '',
        $deleteRoute = '',
        $formatters = [],
    )
    {
        $this->headers = $headers;
        $this->items = $items;
        $this->formatters = $formatters;
        $this->creatable = $creatable;
        $this->editable = $editable;
        $this->deletable = $deletable;
        $this->createRoute = $createRoute;
        $this->editRoute = $editRoute;
        $this->deleteRoute = $deleteRoute;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.data-table');
    }
}
