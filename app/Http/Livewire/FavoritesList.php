<?php

namespace App\Http\Livewire;

use App\Logic\DatasetHelper;
use App\Logic\MetaInventory;
use App\Models\Dataset;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Livewire\Component;

class FavoritesList extends Component
{
    public function render():\Illuminate\View\View
    {
        $favorites = auth()->user()->favorites->map(function($favorite){
            $record = $favorite->collection == 'datasets'
                ? Dataset::find($favorite->collection_id)
                : DB::table($favorite->collection)->where('_id','=',$favorite->collection_id)->first();

            $id = ((array)$record['_id'])['oid']??null;
            $record['_id'] = $id;

            return !isset($record['dataset_id'])
                ? MetaInventory::result_transform($record)
                : DatasetHelper::card_data($record);
        });

        return view('livewire.favorites-list',[
            'favorites'=>$favorites,
        ]);
    }
}
