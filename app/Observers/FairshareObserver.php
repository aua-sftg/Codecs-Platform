<?php

namespace App\Observers;

use App\Logic\MetaInventory;
use App\Models\Fairshare;

class FairshareObserver
{
    /**
     * Handle the Fairshare "created" event.
     *
     * @param  \App\Models\Fairshare  $fairshare
     * @return void
     */
    public function created(Fairshare $fairshare)
    {
        //
    }

    /**
     * Handle the Fairshare "updated" event.
     *
     * @param  \App\Models\Fairshare  $fairshare
     * @return void
     */
    public function updated(Fairshare $fairshare)
    {
        //
    }

    /**
     * Handle the Fairshare "deleted" event.
     *
     * @param  \App\Models\Fairshare  $fairshare
     * @return void
     */
    public function deleted(Fairshare $fairshare)
    {
        MetaInventory::removeFromFavorites(collection:'fairshare',id: $fairshare->id);

    }

    /**
     * Handle the Fairshare "restored" event.
     *
     * @param  \App\Models\Fairshare  $fairshare
     * @return void
     */
    public function restored(Fairshare $fairshare)
    {
        //
    }

    /**
     * Handle the Fairshare "force deleted" event.
     *
     * @param  \App\Models\Fairshare  $fairshare
     * @return void
     */
    public function forceDeleted(Fairshare $fairshare)
    {
        MetaInventory::removeFromFavorites(collection:'fairshare',id: $fairshare->id);
    }
}
