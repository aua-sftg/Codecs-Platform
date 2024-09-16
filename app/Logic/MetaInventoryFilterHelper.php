<?php

namespace App\Logic;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;

class MetaInventoryFilterHelper
{
    public static function getDistinctCountries($countriesToRemove, $useCached = true)
    {

        $cacheKey = 'distinct_countries';
        if ($useCached && Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $distinctCountries = [];

        // Define the collections and field names
        $collections = [
            'fairshare' => 'countries',
            'smartakis' => 'country',
            'desira' => 'CountriesUsed',
            'nutricheck' => 'countries',
        ];

        foreach ($collections as $collectionName => $fieldName) {
            // Fetch distinct countries from each Collection
            $cursor = DB::collection($collectionName)
                ->raw(function ($collection) use ($fieldName) {
                    return $collection->aggregate([
                        ['$unwind' => '$' . $fieldName],
                        ['$group' => ['_id' => '$' . $fieldName]],
                    ]);
                });

            foreach ($cursor as $document) {
                $distinctCountries[] = $document->_id;
            }
        }

        // Keep unique values
        $distinctCountries = array_unique($distinctCountries);

        // Remove countries with a comma character
        $distinctCountries = array_filter($distinctCountries, function($country) {
            return strpos($country, ',') === false && trim($country) === $country;
        });

        if(!empty($countriesToRemove)) {
            $distinctCountries = array_diff($distinctCountries, $countriesToRemove);
        }

        // Sort alphabetically
        sort($distinctCountries);
        usort($distinctCountries, 'strnatcasecmp');

        // Cache the result
        Cache::rememberForever($cacheKey, function () use ($distinctCountries) {
            return $distinctCountries;
        });
        return $distinctCountries;
    }

}
