<?php

namespace App\Observers;

use App\Logic\MetaInventory;
use App\Models\Nutricheck;

class NutricheckObserver
{
    /**
     * Handle the Nutricheck "created" event.
     *
     * @param  \App\Models\Nutricheck  $nutricheck
     * @return void
     */
    public function created(Nutricheck $nutricheck)
    {
        //
    }

    /**
     * Handle the Nutricheck "updated" event.
     *
     * @param  \App\Models\Nutricheck  $nutricheck
     * @return void
     */
    public function updated(Nutricheck $nutricheck)
    {
        //
    }

    /**
     * Handle the Nutricheck "deleted" event.
     *
     * @param  \App\Models\Nutricheck  $nutricheck
     * @return void
     */
    public function deleted(Nutricheck $nutricheck)
    {
        MetaInventory::removeFromFavorites(collection:'nutricheck',id: $nutricheck->id);
    }

    /**
     * Handle the Nutricheck "restored" event.
     *
     * @param  \App\Models\Nutricheck  $nutricheck
     * @return void
     */
    public function restored(Nutricheck $nutricheck)
    {
        //
    }

    /**
     * Handle the Nutricheck "force deleted" event.
     *
     * @param  \App\Models\Nutricheck  $nutricheck
     * @return void
     */
    public function forceDeleted(Nutricheck $nutricheck)
    {
        MetaInventory::removeFromFavorites(collection:'nutricheck',id: $nutricheck->id);
    }
}
