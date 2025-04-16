<?php

namespace App\View\Components\Note;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SearchInput extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(public $route)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.note.search-input');
    }
}
