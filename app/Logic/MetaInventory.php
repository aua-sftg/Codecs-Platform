<?php

namespace App\Logic;

use App\Models\Scenario;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use timgws\QueryBuilderParser;

class MetaInventory
{


    const VENDORS = [
        [
            'label'=>'Fairshare',
            'key'=>'fairshare',
            'logo'=>'',
            'filters'=>[
                [
                    'id'=> 'desc',
                    'label'=> 'Description',
                    'name'=> 'desc',
                    'type'=> 'string',
                ],[
                    'id'=> 'keywords',
                    'label'=> 'Keywords',
                    'name'=> 'keywords',
                    'type'=> 'string',
                ],[
                    'id'=> 'category',
                    'label'=> 'Category',
                    'name'=> 'category',
                    'type'=> 'string',
                ],[
                    'id'=> 'sector',
                    'label'=> 'Sector',
                    'name'=> 'sector',
                    'type'=> 'string',
                ],[
                    'id'=> 'target',
                    'label'=> 'Target',
                    'name'=> 'target',
                    'type'=> 'string',
                ],[
                    'id'=> 'delivery',
                    'label'=> 'Delivery',
                    'name'=> 'delivery',
                    'type'=> 'string',
                ],[
                    'id'=> 'benefits',
                    'label'=> 'Benefits',
                    'name'=> 'benefits',
                    'type'=> 'string',
                ],[
                    'id'=> 'challenges',
                    'label'=> 'Challenges',
                    'name'=> 'challenges',
                    'type'=> 'string',
                ],[
                    'id'=> 'applied',
                    'label'=> 'Applied',
                    'name'=> 'applied',
                    'type'=> 'string',
                ],
            ]
        ],[
            'label'=>'SmartAKIS',
            'key'=>'smartakis',
            'logo'=>'',
            'filters'=>[
                [
                    'id'=> 'description',
                    'label'=> 'Description',
                    'name'=> 'description',
                    'type'=> 'string',
                ],[
                    'id'=> 'croppingSystem',
                    'label'=> 'Cropping System',
                    'name'=> 'croppingSystem',
                    'type'=> 'string',
                ],[
                    'id'=> 'cropType',
                    'label'=> 'Crop type',
                    'name'=> 'cropType',
                    'type'=> 'string',
                ],[
                    'id'=> 'sftType',
                    'label'=> 'SFT type',
                    'name'=> 'sftType',
                    'type'=> 'string',
                ],[
                    'id'=> 'sftEffectOn',
                    'label'=> 'SFT effect on',
                    'name'=> 'sftEffectOn',
                    'type'=> 'string',
                ],[
                    'id'=> 'trl',
                    'label'=> 'TRL',
                    'name'=> 'trl',
                    'type'=> 'string',
                ],
            ]
        ],[
            'label'=>'Desira',
            'key'=>'desira',
            'logo'=>'',
            'filters'=>[
                [
                    'id'=> 'Description',
                    'label'=> 'Description',
                    'name'=> 'Description',
                    'type'=> 'string',
                ],[
                    'id'=> 'Keywords',
                    'label'=> 'Keywords',
                    'name'=> 'Keywords',
                    'type'=> 'string',
                ],[
                    'id'=> 'Domain',
                    'label'=> 'Domain',
                    'name'=> 'Domain',
                    'type'=> 'string',
                ],[
                    'id'=> 'Subdomain',
                    'label'=> 'Subdomain',
                    'name'=> 'Subdomain',
                    'type'=> 'string',
                ],[
                    'id'=> 'ApplicationScenarios',
                    'label'=> 'Application scenarios',
                    'name'=> 'ApplicationScenarios',
                    'type'=> 'string',
                ],[
                    'id'=> 'Technology',
                    'label'=> 'Technology',
                    'name'=> 'Technology',
                    'type'=> 'string',
                ],[
                    'id'=> 'AchievedOutcome',
                    'label'=> 'AchievedOutcome',
                    'name'=> 'AchievedOutcome',
                    'type'=> 'string',
                ],[
                    'id'=> 'MaturityLevel',
                    'label'=> 'Maturity level',
                    'name'=> 'MaturityLevel',
                    'type'=> 'string',
                ],
            ]
        ],
    ];

    public static function cached(Scenario $scenario) : Collection
    {
        $results = collect();

        if ($scenario->meta_inventory) {
            foreach ($scenario->meta_inventory as $collection=>$ids)
            {
                $table = DB::table($collection);
                $results = $results->merge(
                    $table->whereIn('_id',$ids)->get()
                );
            }
        }

        return $results;
    }

    /**
     *
     * Given the criteria it queries the collections passed and returns the results
     *
     * $criteria = [
     *    [
     *      'collection'=>'collection_name',
     *      'rules'=>[...rules from the query builder in array format...]
     *    ],...
     * ]
     *
     * @return Collection
     */
    public static function search(Collection $criteria):Collection
    {
        $results = collect([]);
        $criteria->each(function($item,$key) use (&$results){
            $table = DB::collection($item['collection']);
            $queryBuilder = new QueryBuilderParser();
            $query = $queryBuilder->parse(json_encode($item['rules']),$table);
            $results->push(...$query->get());
        });
        return $results;
    }

    /**
     *
     * This function transforms the results from the search function to the format used in admin panel to show the results
     *
     * @param Collection $results
     * @return Collection
     */
    public static function search_results_transform(Collection $results):Collection
    {
        return $results->map(function($record){
            $vendor = isset($record['fairshare_id']) ? 'fairshare' : (isset($record['smartakis_id']) ? 'smartakis' : 'desira');
            return [
                'vendor'=> $vendor,
                'title'=>$vendor=='desira'?$record['ToolName']:($vendor=='fairshare'?$record['name']:$record['title']),
                'desc'=> $vendor == 'fairshare' ? $record['desc'] : ($vendor=='smartakis' ? $record['description'] : $record['Description']),
            ];
        });
    }

    public static function results_transform(Collection $results):Collection {
        return $results->map(function($record){
            $vendor = isset($record['fairshare_id']) ? 'fairshare' : (isset($record['smartakis_id']) ? 'smartakis' : 'desira');

            $image = match($vendor) {
                'fairshare'=>   isset($record['imagePath'][0]) ? $record['imagePath'][0] : asset('img/fairshare-logo-light.png'),
                'smartakis'=> isset($record['picAddress'][0]) ? $record['picAddress'][0] : asset('img/smartakis=log.png'),
                'desira'=> asset('img/Logo-Desira.png')
            };
            return [
                'vendor'=> $vendor,
                'id'=>$record['_id'],
                'title'=>$vendor=='desira'?$record['ToolName']:($vendor=='fairshare'?$record['name']:$record['title']),
                'short_desc'=> $vendor == 'fairshare' ? $record['title'] : ($vendor=='smartakis' ? $record['shortDescription'] : $record['Description']),
                'keywords'=>$vendor == 'fairshare' ? explode(',', $record['keywords']) : ($vendor=='smartakis' ? $record['croppingSystem'] : $record['Keywords']),
                'image'=>$image,
                'update_date'=>$vendor == 'desira' ? $record['updated_at'] : $record['updatedAt'],
                'source'=>$vendor=='desira'?'Desira': ($vendor =='fairshare'?'Fairshare' :($vendor=='smartakis'?'smartAKIS':$vendor)),
            ];
        });
    }

    public static function extractCriteria(array $filters)
    {
        $criteria = [];
        collect($filters)->each(function($item,$key) use (&$criteria){
            if($item==null) return;
            $criteria[]=[
                'collection'=>$key,
                'rules'=>$item
            ];
        });
        return $criteria;
    }

    public static function statistics():array
    {
        $stats = [];
        foreach (self::VENDORS as $vendor)
        {
            $stats[$vendor['key']] = DB::collection($vendor['key'])->count();
        }
        return $stats;
    }
}
