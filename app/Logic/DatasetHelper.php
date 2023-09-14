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
            ],[  // Select
                'label'     => "Organization",
                'type'      => 'select',
                'name'      => 'organization_id', // the db column for the foreign key

                // optional
                // 'entity' should point to the method that defines the relationship in your Model
                // defining entity will make Backpack guess 'model' and 'attribute'
                'entity'    => 'organization',

                // optional - manually specify the related model and attribute
                'model'     => "App\Models\Organization", // related model
                'attribute' => 'name', // foreign key attribute that is shown to user

                // optional - force the related options to be a custom query, instead of all();
                'options'   => (function ($query) {
                    return $query->orderBy('name', 'ASC')->get();
                }), //  you can use this to filter the results show in the select
                'create'=>true,
                'list'=>true,
            ]
        ]);
    }
}
