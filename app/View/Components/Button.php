<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Button extends Component
{
    public function __construct()
    {
        // Constructor logic if needed
    }

    public function render(): View|string
    {
        return view('components.button');
    }
}
