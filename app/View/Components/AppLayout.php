<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{

    /**
     * Returns the view for the layout
     *
     * @return \Closure|\Illuminate\Contracts\Support\Htmlable|\Illuminate\Contracts\View\View|string|void
     */
    public function render()
    {
        return view('layouts.app');
    }
}
