<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Alert extends Component
{
    public string|null $style;
    public string|null $text;

    /**
     * Create a new component instance.
     */
    public function __construct(string $style = null, string $text = null)
    {
        $this->style = $style;
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
