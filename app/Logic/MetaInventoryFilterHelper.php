<?php

namespace App\Logic;

use Illuminate\Support\Facades\DB;

class MetaInventoryFilterHelper
{
    public static function getDistinctCountries()
    {
        $distinctCountries = [];

        // Define the collections and field names
        $collections = [
            'fairshare' => 'countries',
            'smartakis' => 'country',
            'desira' => 'CountriesUsed',
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

        // Sort alphabetically
        sort($distinctCountries);
        return $distinctCountries;
    }

}
