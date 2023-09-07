<?php

namespace App\Traits;

trait BackpackFieldsTrait
{
    public static function create_fields() : array
    {
        return self::fields()->where('create','=',true)->toArray();
    }

    public static function list_fields() : array
    {
        return self::fields()->where('list','=',true)->toArray();
    }
}
