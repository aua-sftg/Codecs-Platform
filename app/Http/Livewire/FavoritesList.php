<?php

namespace App\Http\Livewire;

use App\Logic\MetaInventory;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class FavoritesList extends Component
{
    public function render()
    {

        $favorites = auth()->user()->favorites->map(function($favorite){
            $record = DB::table($favorite->collection)->where('_id','=',$favorite->collection_id)->first();
            $id = ((array)$record['_id'])['oid']??null;
            $record['_id'] = $id;
            return $record;
        });

        return view('livewire.favorites-list',[
            'favorites'=>MetaInventory::results_transform($favorites),
        ]);
    }
}
