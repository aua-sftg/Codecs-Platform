<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MetaInventorySearch extends Component
{

    public string $searchTerm='';
    public function render()
    {
        return view('livewire.meta-inventory-search');
    }

    public function search() {
        $this->emit('searchParam', $this->searchTerm);
    }

    public function clearSearch()
    {
        $this->searchTerm = '';
        $this->emit('searchParam', $this->searchTerm);
    }
}
