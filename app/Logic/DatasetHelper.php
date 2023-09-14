<?php

namespace App\Logic;

use App\Interfaces\BackpackFieldsInterface;
use App\Traits\BackpackFieldsTrait;
use Illuminate\Support\Collection;

class DatasetHelper implements BackpackFieldsInterface
{
    use BackpackFieldsTrait;

    const VALIDATION_RULES = [
        'name'=>'required|string|min:3',
        'abstract'=>'required|string|min:3',
        'description'=>'required|string|min:3',
        'release_date'=>'required|string|min:3',
        'data_formats'=>'required',
        'organization_id'=>'required',
        'license_scheme'=>'nullable|url',
    ];

    public static function fields(): Collection
    {
        return collect([
            [
                'name'      => 'file',
                'label'     => 'Dataset File',
                'type'      => 'upload',
                'upload'    => true,
                'disk'      => 'datasets',
                'create'=>true,
            ],[
                'type'=>'text',
                'name'=>'name',
                'label'=>'Dataset Name',
                'create'=>true,
                'list'=>true,
            ],[
                'name'=>'abstract',
                'type'=>'textarea',
                'label'=>'Abstract',
                'create'=>true,
            ],[
                'name'=>'description',
                'type'=>'textarea',
                'label'=>'Description',
                'create'=>true,
            ],[   // Date
                'name'  => 'release_date',
                'label' => 'Date of release',
                'type'  => 'date',
                'create'=>true,
                'list'=>true,
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
                'label'     => "Creator",
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
            ],[
                'type'=>'url',
                'name'=>'license_scheme',
                'label'=>'Licensing Scheme',
                'create'=>true,
            ],[
                'type'=>'textarea',
                'label'=>'Data collection method',
                'name'=>'data_collection_method',
                'create'=>true,
            ],[
                'type'=>'number',
                'label'=>'Version',
                'name'=>'version',
                'create'=>true,
            ],[
                'type'=>'text',
                'label'=>'DOI/ ROR/ ISSN ',
                'name'=>'reference_link',
                'create'=>true,
            ],[
                'type'=>'text',
                'label'=>'OECD Frascati classification',
                'name'=>'oecd_frascati_classification',
                'create'=>true,
            ],[
                'type'=>'url',
                'label'=>'External data source',
                'name'=>'external_data_source',
                'create'=>true,
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
                'name'        => 'status',
                'label'       => "Status",
                'type'        => 'select_from_array',
                'options'     => Status::STATUS_LABELS_ARRAY,
                'allows_null' => false,
                'default'     => Status::STATUS_ACTIVE,
                'create'=>true,
                'list'=>true,
            ],[
                'name'  => 'uploaded_by',
                'type'  => 'hidden',
                'value' => backpack_user()->id,
                'create'=>true
            ],
        ]);
    }
}
