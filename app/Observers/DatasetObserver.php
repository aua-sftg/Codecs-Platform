<?php

namespace App\Observers;

use App\Logic\DatasetHelper;
use App\Logic\Status;
use App\Models\Dataset;

class DatasetObserver
{
    /**
     * Handle the Dataset "created" event.
     *
     * @param  \App\Models\Dataset  $dataset
     * @return void
     */
    public function created(Dataset $dataset)
    {
        //
    }

    /**
     * Handle the Dataset "updated" event.
     *
     * @param  \App\Models\Dataset  $dataset
     * @return void
     */
    public function updated(Dataset $dataset)
    {
        if($dataset->status != Status::STATUS_PUBLISHED)
        {
            DatasetHelper::removeFromFavorites($dataset->id);
        }
    }

    /**
     * Handle the Dataset "deleted" event.
     *
     * @param  \App\Models\Dataset  $dataset
     * @return void
     */
    public function deleted(Dataset $dataset)
    {
        DatasetHelper::removeFromFavorites($dataset->id);
    }

    /**
     * Handle the Dataset "restored" event.
     *
     * @param  \App\Models\Dataset  $dataset
     * @return void
     */
    public function restored(Dataset $dataset)
    {
    }

    /**
     * Handle the Dataset "force deleted" event.
     *
     * @param  \App\Models\Dataset  $dataset
     * @return void
     */
    public function forceDeleted(Dataset $dataset)
    {
        DatasetHelper::removeFromFavorites($dataset->id);
    }
}
