<?php

namespace App\Logic;

use App\Interfaces\BackpackFieldsInterface;
use App\Traits\BackpackFieldsTrait;
use Illuminate\Support\Collection;

class AudienceHelper implements BackpackFieldsInterface
{
    use BackpackFieldsTrait;


    const VALIDATION_RULES = [
        'name'=>'required|string|max:255'
    ];

    public static function fields(): Collection
    {
        return collect([
            [
                'type'=>'text',
                'name'=>'name',
                'label'=>'Audience Name',
                'create'=>true,
                'list'=>true,
            ]
        ]);
    }
}
