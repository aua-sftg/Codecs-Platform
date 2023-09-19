<?php

namespace App\View\Components;

use Illuminate\View\Component;

class datasetCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $keywords;
    public function __construct($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.metainventory.dataset-card');
    }
}
