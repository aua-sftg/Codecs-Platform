<?php

namespace App\Logic;

use App\Interfaces\BackpackFieldsInterface;
use App\Traits\BackpackFieldsTrait;
use Illuminate\Support\Collection;

class DatasetHelper implements BackpackFieldsInterface
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
                'label'=>'Dataset Name',
                'create'=>true,
                'list'=>true,
            ],[
                'label'     => "Audiences",
                'type'      => 'select_multiple',
                'name'      => 'audiences', // the method that defines the relationship in your Model

                // optional
                'entity'    => 'audiences', // the method that defines the relationship in your Model
                'model'     => "App\Models\Audience", // foreign key model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'create'=>true,
            ],[
                'label'     => "Data formats",
                'type'      => 'select_multiple',
                'name'      => 'data_formats', // the method that defines the relationship in your Model

                // optional
                'entity'    => 'data_formats', // the method that defines the relationship in your Model
                'model'     => "App\Models\DataFormat", // foreign key model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'create'=>true,
            ]
        ]);
    }
}
