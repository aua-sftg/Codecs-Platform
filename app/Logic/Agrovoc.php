<?php

namespace App\Logic;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Agrovoc
{
    public static function search(string $keyword = '', array $except=[]):Collection
    {
        $safe_keyword = urlencode($keyword);
        $src = "https://agrovoc.fao.org/browse/rest/v1/search/?query={$safe_keyword}*&lang=en";

        return
           collect(
                json_decode
                (
                    file_get_contents($src)
                )->results
            )->map(function($result) use ($except){
               return in_array($result->prefLabel,$except)
                ? false
                : [
                    '_id' => json_encode([
                        'vendor'=>'agrovoc',
                        'url'=>$result->uri,
                        'label'=>$result->prefLabel,
                    ]),
                    'name' => $result->prefLabel,
                ];
            })->reject(function ($value) {
               return $value === false;
           });
    }
}
