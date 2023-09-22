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
        $datasets = auth()
            ->user()
            ->datasets()
            ->with(['keywords','organization'])
            ->get();

        return view('livewire.dataset-inventory.archive',[
            'datasets'=> $this->sort_by=='created_at'
                ? $datasets->sortByDesc($this->sort_by,)
                : $datasets->sortBy($this->sort_by)
        ]);
    }
}
