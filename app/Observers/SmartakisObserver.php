<?php

namespace App\Observers;

use App\Logic\MetaInventory;
use App\Models\Smartakis;

class SmartakisObserver
{
    /**
     * Handle the Smartakis "created" event.
     *
     * @param  \App\Models\Smartakis  $smartakis
     * @return void
     */
    public function created(Smartakis $smartakis)
    {
        //
    }

    /**
     * Handle the Smartakis "updated" event.
     *
     * @param  \App\Models\Smartakis  $smartakis
     * @return void
     */
    public function updated(Smartakis $smartakis)
    {
        //
    }

    /**
     * Handle the Smartakis "deleted" event.
     *
     * @param  \App\Models\Smartakis  $smartakis
     * @return void
     */
    public function deleted(Smartakis $smartakis)
    {
        MetaInventory::removeFromFavorites(collection:'smartakis',id: $smartakis->id);
    }

    /**
     * Handle the Smartakis "restored" event.
     *
     * @param  \App\Models\Smartakis  $smartakis
     * @return void
     */
    public function restored(Smartakis $smartakis)
    {
        //
    }

    /**
     * Handle the Smartakis "force deleted" event.
     *
     * @param  \App\Models\Smartakis  $smartakis
     * @return void
     */
    public function forceDeleted(Smartakis $smartakis)
    {
        MetaInventory::removeFromFavorites(collection:'smartakis',id: $smartakis->id);
    }
}
