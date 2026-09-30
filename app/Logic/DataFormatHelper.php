<?php

namespace App\Logic;

use App\Interfaces\BackpackFieldsInterface;
use App\Traits\BackpackFieldsTrait;
use Illuminate\Support\Collection;

class DataFormatHelper implements BackpackFieldsInterface
{

    use BackpackFieldsTrait;

    const VALIDATION_RULES = [
        'name'=>'required|string|min:3'
    ];

    public static function fields(): Collection
    {
        return collect([
            [
                'type'=>'text',
                'name'=>'name',
                'label'=>'Data format Name',
                'create'=>true,
                'list'=>true,
            ]
        ]);
    }

}
