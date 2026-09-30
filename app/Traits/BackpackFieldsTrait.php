<?php

namespace App\Traits;

trait BackpackFieldsTrait
{
    public static function create_fields() : array
    {
        return self::fields()
            ->where('create','=',true)
            ->sortBy('order')
            ->toArray();
    }

    public static function list_fields() : array
    {
        return self::fields()
            ->where('list','=',true)
            ->map(function($field){
                $field['type']=$field['list_type']??$field['type'];
                return $field;
            })
            ->sortBy('order')->toArray();
    }
}
