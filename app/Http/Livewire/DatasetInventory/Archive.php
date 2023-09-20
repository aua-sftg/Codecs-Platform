<?php

namespace App\Http\Livewire\DatasetInventory;

use App\Models\User;
use Livewire\Component;

class Archive extends Component
{

    public function render()
    {
        return view('livewire.dataset-inventory.archive',[
            'datasets'=> auth()->user()->datasets()->with('keywords')->get()
        ]);
    }
}
