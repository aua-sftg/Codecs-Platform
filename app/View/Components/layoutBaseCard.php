<?php

namespace App\View\Components;

use Illuminate\View\Component;

class layoutBaseCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct(public string $title, public array $keywords, public string $exceptr, public string $containerClass='', public string|null $image=null)
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {

        return view('components.layout.base-card');
    }
}
