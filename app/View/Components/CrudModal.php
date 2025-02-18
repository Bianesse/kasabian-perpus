<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CrudModal extends Component
{
    /**
     * Create a new component instance.
     */
    public $id;
    public $header;
    public $body;
    public function __construct($id, $header = null, $body = null)
    {
        $this->id = $id;
        $this->header = $header;
        $this->body = $body;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.crud-modal');
    }
}
