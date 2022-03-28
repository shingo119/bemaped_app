<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SpotCard extends Component
{
    public $spot;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($spot)
    {
        $this->spot = $spot;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.spot-card');
    }
}
