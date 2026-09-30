<?php

namespace App\Observers;

use App\Logic\MetaInventory;
use App\Models\IPMWorks;

class IPMWorksObserver
{
    /**
     * Handle the IPMWorks "created" event.
     *
     * @param  \App\Models\IPMWorks  $ipmworks
     * @return void
     */
    public function created(IPMWorks $ipmworks)
    {
        //
    }

    /**
     * Handle the IPMWorks "updated" event.
     *
     * @param  \App\Models\IPMWorks  $ipmworks
     * @return void
     */
    public function updated(IPMWorks $ipmworks)
    {
        //
    }

    /**
     * Handle the IPMWorks "deleted" event.
     *
     * @param  \App\Models\IPMWorks  $ipmworks
     * @return void
     */
    public function deleted(IPMWorks $ipmworks)
    {
        MetaInventory::removeFromFavorites(collection:'ipmworks',id: $ipmworks->id);
    }

    /**
     * Handle the IPMWorks "restored" event.
     *
     * @param  \App\Models\IPMWorks  $ipmworks
     * @return void
     */
    public function restored(IPMWorks $ipmworks)
    {
        //
    }

    /**
     * Handle the IPMWorks "force deleted" event.
     *
     * @param  \App\Models\IPMWorks  $ipmworks
     * @return void
     */
    public function forceDeleted(IPMWorks $ipmworks)
    {
        MetaInventory::removeFromFavorites(collection:'ipmworks',id: $ipmworks->id);
    }
}
