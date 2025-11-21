<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormComponent extends Component
{
    public $fields;
    public $model;
    public $action;
    public $method;
    public $submitText;
    public $formatters;
    public $errors;

    /**
     * Create a new component instance.
     */
    public function __construct(
        $fields = [],
        $model = [],
        $action = '',
        $method = 'POST',
        $submitText = 'Submit',
        $formatters = [],
        $errors = null
    )
    {
        $this->fields = $fields;
        $this->model = $model;
        $this->action = $action;
        $this->method = strtoupper($method);
        $this->submitText = $submitText;
        $this->formatters = $formatters;
        $this->errors = $errors;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-component');
    }
}
