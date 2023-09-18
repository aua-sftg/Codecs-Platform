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
        'sector'=>'required',
        'keywords'=>'required',
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
                'order'=>1
            ],[
                'type'=>'text',
                'name'=>'name',
                'label'=>'Dataset Name',
                'create'=>true,
                'list'=>true,
                'order'=>10
            ],[
                'label'       => "Sector", // Table column heading
                'type'        => "select2_from_ajax_multiple",
                'name'        => 'sector', // a unique identifier (usually the method that defines the relationship in your Model)
                'entity'      => 'sector', // the method that defines the relationship in your Model
                'attribute'   => "name", // foreign key attribute that is shown to user
                'data_source' => url("api/sector"), // url to controller search function (with /{id} should return model)
                'tags'=>false,
                // OPTIONAL
                'delay' => 500, // the minimum amount of time between ajax requests when searching in the field
                'model'                      => "App\Models\Sector", // foreign key model
                'placeholder'                => "Type sector...", // placeholder for the select
                'minimum_input_length'       => 2, // minimum characters to type before querying results
                'method'                  => 'POST', // optional - HTTP method to use for the AJAX call (GET, POST)
                'create'=>true,
                'order'=>20,
                'hint'=>'Type sector name and select from the list or create a new one. Agrovoc terms are also available.'
            ],[
                'label'       => "Keywords", // Table column heading
                'type'        => "select2_from_ajax_multiple",
                'name'        => 'keywords', // a unique identifier (usually the method that defines the relationship in your Model)
                'entity'      => 'keywords', // the method that defines the relationship in your Model
                'attribute'   => "name", // foreign key attribute that is shown to user
                'data_source' => url("api/keywords"), // url to controller search function (with /{id} should return model)
                'tags'=>false,
                // OPTIONAL
                'delay' => 500, // the minimum amount of time between ajax requests when searching in the field
                'model'                      => "App\Models\Keyword", // foreign key model
                'placeholder'                => "Type keyword...", // placeholder for the select
                'minimum_input_length'       => 2, // minimum characters to type before querying results
                'method'                  => 'POST', // optional - HTTP method to use for the AJAX call (GET, POST)
                'create'=>true,
                'order'=>50,
                'hint'=>'Type keyword and select from the list or create a new one. Agrovoc terms are also available.'
            ],[
                'name'=>'abstract',
                'type'=>'textarea',
                'label'=>'Abstract',
                'create'=>true,
                'order'=>30
            ],[
                'name'=>'description',
                'type'=>'textarea',
                'label'=>'Description',
                'create'=>true,
                'order'=>40
            ],[   // Date
                'name'  => 'release_date',
                'label' => 'Date of release',
                'type'  => 'date',
                'create'=>true,
                'list'=>true,
                'order'=>60
            ],[
                'label'     => "Data formats",
                'type'      => 'select2_multiple',
                'name'      => 'data_formats', // the method that defines the relationship in your Model

                // optional
                'entity'    => 'data_formats', // the method that defines the relationship in your Model
                'model'     => "App\Models\DataFormat", // foreign key model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'create'=>true,
                'order'=>70
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
                'order'=>80
            ],[
                'type'=>'url',
                'name'=>'license_scheme',
                'label'=>'Licensing Scheme',
                'create'=>true,
                'order'=>90
            ],[
                'type'=>'textarea',
                'label'=>'Data collection method',
                'name'=>'data_collection_method',
                'create'=>true,
                'order'=>100
            ],[
                'type'=>'number',
                'label'=>'Version',
                'name'=>'version',
                'create'=>true,
                'order'=>110
            ],[
                'type'=>'text',
                'label'=>'DOI/ ROR/ ISSN ',
                'name'=>'reference_link',
                'create'=>true,
                'order'=>120,
                'hint'=>'Full url. Example: https://doi.org/10.5281/zenodo.4555343'
            ],[
                'type'=>'text',
                'label'=>'OECD Frascati classification',
                'name'=>'oecd_frascati_classification',
                'create'=>true,
                'order'=>130
            ],[
                'type'=>'url',
                'label'=>'External data source',
                'name'=>'external_data_source',
                'create'=>true,
                'order'=>140,
                'hint'=>'Full url. Example: https://www.oecd.org/sti/inno/38235147.pdf'
            ],[
                'label'     => "Audiences",
                'type'      => 'select2_multiple',
                'name'      => 'audiences', // the method that defines the relationship in your Model

                // optional
                'entity'    => 'audiences', // the method that defines the relationship in your Model
                'model'     => "App\Models\Audience", // foreign key model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'create'=>true,
                'order'=>150
            ],[
                'name'        => 'status',
                'label'       => "Status",
                'type'        => 'select_from_array',
                'options'     => Status::STATUS_LABELS_ARRAY,
                'allows_null' => false,
                'default'     => Status::STATUS_ACTIVE,
                'create'=>true,
                'list'=>true,
                'order'=>300
            ],[
                'name'  => 'uploaded_by',
                'type'  => 'hidden',
                'value' => backpack_user()->id,
                'create'=>true
            ],
        ]);
    }
}
