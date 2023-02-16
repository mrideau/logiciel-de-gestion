<?php

namespace App\View\Components;

use Illuminate\View\Component;

class OperationsTable extends Component
{
    public $showActions;
    public $operations;
    public $total;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($operations, $total, $showActions = false)
    {
        $this->operations = $operations;
        $this->total = $total;
        $this->showActions = $showActions;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.operations-table');
    }
}
