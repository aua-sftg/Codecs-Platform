<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MetaInventoryCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public array $dataset;
    public function __construct($dataset)
    {
        $this->dataset = $dataset;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.metainventory.meta_inventory_card');
    }
}
