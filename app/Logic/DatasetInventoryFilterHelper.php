<?php

namespace App\Logic;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class DatasetInventoryFilterHelper
{
    public static function getDistinctValues($collectionName, $fieldName, $useCached = true)
    {
        $cacheKey = 'distinct_' . $collectionName . '_' . $fieldName;
        if ($useCached && Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $distinctValues = [];

        $cursor = DB::collection($collectionName)
            ->raw(function ($collection) use ($fieldName) {
                return $collection->aggregate([
                    ['$unwind' => '$' . $fieldName],
                    ['$group' => ['_id' => '$' . $fieldName]],
                ]);
            });

        foreach ($cursor as $document) {
            $distinctValues[] = $document->_id;
        }

        // Keep unique values
        $distinctValues = array_unique($distinctValues);

        // Sort alphabetically
        sort($distinctValues);
        usort($distinctValues, 'strnatcasecmp');

        // Cache the result
        Cache::rememberForever($cacheKey, function () use ($distinctValues) {
            return $distinctValues;
        });

        return $distinctValues;
    }
}
