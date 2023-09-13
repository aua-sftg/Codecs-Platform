<?php

namespace App\Observers;

use App\Models\Scenario;

class ScenarioObserver
{
    /**
     * Handle the Scenario "created" event.
     *
     * @param  \App\Models\Scenario  $scenario
     * @return void
     */
    public function created(Scenario $scenario)
    {
        event(new \App\Events\ScenarioChanged($scenario));
    }

    /**
     * Handle the Scenario "updated" event.
     *
     * @param  \App\Models\Scenario  $scenario
     * @return void
     */
    public function updated(Scenario $scenario)
    {
        event(new \App\Events\ScenarioChanged($scenario));
    }

    /**
     * Handle the Scenario "deleted" event.
     *
     * @param  \App\Models\Scenario  $scenario
     * @return void
     */
    public function deleted(Scenario $scenario)
    {
        //
    }

    /**
     * Handle the Scenario "restored" event.
     *
     * @param  \App\Models\Scenario  $scenario
     * @return void
     */
    public function restored(Scenario $scenario)
    {
        //
    }

    /**
     * Handle the Scenario "force deleted" event.
     *
     * @param  \App\Models\Scenario  $scenario
     * @return void
     */
    public function forceDeleted(Scenario $scenario)
    {
        //
    }
}
