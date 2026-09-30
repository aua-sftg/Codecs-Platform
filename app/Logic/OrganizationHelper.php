<?php

namespace App\Logic;

use App\Interfaces\BackpackFieldsInterface;
use App\Traits\BackpackFieldsTrait;
use Illuminate\Support\Collection;

class OrganizationHelper implements BackpackFieldsInterface
{

    use BackpackFieldsTrait;

    const VALIDATION_RULES = [
        'name'=>'required|string|min:3',
        'link'=>'nullable|url',
        'email'=>'nullable|email',
    ];
    public static function fields(): Collection
    {
        return collect([
            [
                'type'=>'text',
                'name'=>'short_name',
                'label'=>'Organization short name',
                'create'=>true,
                'list'=>true,
            ],[
                'type'=>'text',
                'name'=>'name',
                'label'=>'Organization full name',
                'create'=>true,
                'list'=>true,
            ],[
                'name'  => 'email',
                'label' => 'Email of organization',
                'type'  => 'email',
                'create'=>true,
                'list'=>true,
            ],[
                'name'  => 'link',
                'label' => 'Link to organization',
                'type'  => 'url',
                'create'=>true,
                'list'=>true,
            ]
        ]);
    }
}
