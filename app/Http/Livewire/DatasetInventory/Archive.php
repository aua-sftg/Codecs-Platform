<?php

namespace App\Http\Livewire\DatasetInventory;

use App\Models\User;
use Livewire\Component;

class Archive extends Component
{

    protected $queryString = ['sort_by'];
    public string $sort_by = 'created_at';

    public function render()
    {
        return view('livewire.dataset-inventory.archive',[
            'datasets'=> auth()
                ->user()
                ->datasets()
                ->with(['keywords','organization'])
                ->get()
                ->sortBy($this->sort_by)
        ]);
    }
}
