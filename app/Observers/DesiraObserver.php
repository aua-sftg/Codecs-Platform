<?php

namespace App\Observers;

use App\Logic\MetaInventory;
use App\Models\Desira;

class DesiraObserver
{
    /**
     * Handle the Desira "created" event.
     *
     * @param  \App\Models\Desira  $desira
     * @return void
     */
    public function created(Desira $desira)
    {
        //
    }

    /**
     * Handle the Desira "updated" event.
     *
     * @param  \App\Models\Desira  $desira
     * @return void
     */
    public function updated(Desira $desira)
    {
        //
    }

    /**
     * Handle the Desira "deleted" event.
     *
     * @param  \App\Models\Desira  $desira
     * @return void
     */
    public function deleted(Desira $desira)
    {
        MetaInventory::removeFromFavorites('desira',$desira->id);
    }

    /**
     * Handle the Desira "restored" event.
     *
     * @param  \App\Models\Desira  $desira
     * @return void
     */
    public function restored(Desira $desira)
    {
        //
    }

    /**
     * Handle the Desira "force deleted" event.
     *
     * @param  \App\Models\Desira  $desira
     * @return void
     */
    public function forceDeleted(Desira $desira)
    {
        MetaInventory::removeFromFavorites(collection:'desira',id: $desira->id);
    }
}
