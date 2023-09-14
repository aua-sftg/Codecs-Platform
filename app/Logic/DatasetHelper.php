<?php

namespace App\Logic;

use App\Interfaces\BackpackFieldsInterface;
use App\Traits\BackpackFieldsTrait;
use Illuminate\Support\Collection;

class DatasetHelper implements BackpackFieldsInterface
{
    use BackpackFieldsTrait;

    public static function fields(): Collection
    {
        return collect([
            [
                'type'=>'text',
                'name'=>'name',
                'label'=>'Dataset Name',
                'create'=>true,
                'list'=>true,
            ]
        ]);
    }
}
