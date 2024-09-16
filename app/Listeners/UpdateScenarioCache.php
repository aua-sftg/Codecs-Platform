<?php

namespace App\Listeners;

use App\Events\ScenarioChanged;
use App\Logic\MetaInventory;
use App\Logic\ScenarioHelper;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateScenarioCache
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ScenarioChanged  $event
     * @return void
     */
    public function handle(ScenarioChanged $event)
    {
        $results = ScenarioHelper::get_results(scenario: $event->scenario,cache:false);

        $collection_results = [
            'fairshare'=>[],
            'smartakis'=>[],
            'desira'=>[],
            'nutricheck'=>[],
        ];

        $results->each(function($result) use (&$collection_results){
            if(isset($result['fairshare_id']))
                $key = 'fairshare';
            elseif(isset($result['smartakis_id']))
                $key='smartakis';
            elseif(isset($result['nutricheck_id']))
                $key='nutricheck';
            else
                $key='desira';


            $collection_results[$key][] = ((array)$result['_id'])['oid'];
        });

        $event->scenario->meta_inventory = $collection_results;
        $event->scenario->saveQuietly();
    }
}
