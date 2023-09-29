<?php

namespace App\Logic;

use App\Interfaces\BackpackFieldsInterface;
use App\Models\Dataset;
use App\Models\Favorite;
use App\Traits\BackpackFieldsTrait;
use Dflydev\DotAccessData\Data;
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

    public static function removeFromFavorites(string $dataset_id)
    {
        Favorite::where('collection','=','datasets')
            ->where('collection_id','=',$dataset_id)
            ->delete();
    }


    /**
     *  Retrieve the active datasets from the database order by lft asc and return the collection
     * Use the parameter $status to choose which scenarios you want(published, unpublished, draft, all)
     * @mike shall we cache this? to be discussed
     * @return Collection
     */
    public static function get_datasets(string $status = Status::STATUS_PUBLISHED) : Collection
    {
        // Define a query builder for datasets
        $query = Dataset::query();

        in_array($status, [Status::STATUS_PUBLISHED, Status::STATUS_UNPUBLISHED, Status::STATUS_DRAFT])
            ? $query->where('status', $status)
            : null;

        // Order the scenarios by 'lft' in ascending order
        return $query->orderBy('lft', 'asc')->get();
    }

    public static function stepped_fields(): Collection
    {
        return DatasetHelper::fields()
            ->where('create',true)
            ->where('step')
            ->sortBy('step')
            ->groupBy('step');
    }

    public static function required_fields(): array
    {
        return collect(\App\Logic\DatasetHelper::VALIDATION_RULES)->filter(function($value,$key){
            return str_contains($value, 'required');
        })->keys()->toArray();
    }

    public static function fields(): Collection
    {
        return collect([
            [
                'name'      => 'file',
                'label'     => 'Dataset File',
                'type'      => 'upload',
                'upload'    => true,
                'disk'      => 'datasets',
                'exclude_from_form_save'=>true,
                'create'=>true,
                'order'=>1,
                'step'=>3,
                'tab'=>'Upload',
            ],[
                'type'=>'text',
                'name'=>'name',
                'label'=>'Dataset Name',
                'create'=>true,
                'list'=>true,
                'order'=>10,
                'tab'=>'General Information',
                'hint'=>'The name or title of your dataset',
                'step'=>1
            ],[
                'label'       => "Sector", // Table column heading
                'type'        => "select2_from_ajax_multiple",
                'name'        => 'sector', // a unique identifier (usually the method that defines the relationship in your Model)
                'entity'      => 'sector', // the method that defines the relationship in your Model
                'attribute'   => "name", // foreign key attribute that is shown to user
                'data_source' => url("api/sector"), // url to controller search function (with /{id} should return model)
                'tags'=>false,
                'exclude_from_form_save'=>true,
                // OPTIONAL
                'delay' => 500, // the minimum amount of time between ajax requests when searching in the field
                'model'                      => "App\Models\Sector", // foreign key model
                'placeholder'                => "Type sector...", // placeholder for the select
                'minimum_input_length'       => 2, // minimum characters to type before querying results
                'method'                  => 'POST', // optional - HTTP method to use for the AJAX call (GET, POST)
                'create'=>true,
                'order'=>20,
                'tab'=>'General Information',
                'hint'=>'The industry or field to which the dataset belongs',
                'step'=>1
            ],[
                'label'       => "Keywords", // Table column heading
                'type'        => "select2_from_ajax_multiple",
                'name'        => 'keywords', // a unique identifier (usually the method that defines the relationship in your Model)
                'entity'      => 'keywords', // the method that defines the relationship in your Model
                'attribute'   => "name", // foreign key attribute that is shown to user
                'data_source' => url("api/keywords"), // url to controller search function (with /{id} should return model)
                'tags'=>false,
                'exclude_from_form_save'=>true,
                // OPTIONAL
                'delay' => 500, // the minimum amount of time between ajax requests when searching in the field
                'model'                      => "App\Models\Keyword", // foreign key model
                'placeholder'                => "Type keyword...", // placeholder for the select
                'minimum_input_length'       => 2, // minimum characters to type before querying results
                'method'                  => 'POST', // optional - HTTP method to use for the AJAX call (GET, POST)
                'create'=>true,
                'order'=>50,
                'tab'=>'Description',
                'hint'=>"Relevant keywords describing the dataset's content",
                'step'=>2
            ],[
                'name'=>'abstract',
                'type'=>'textarea',
                'label'=>'Abstract',
                'tab'=>'Description',
                'hint'=>"A concise summary of the dataset's main findings or purpose",
                'create'=>true,
                'order'=>30,
                'step'=>2
            ],[
                'name'=>'description',
                'type'=>'textarea',
                'label'=>'Description',
                'tab'=>'Description',
                'hint'=>"A more detailed explanation of the dataset's contents and context",
                'create'=>true,
                'order'=>40,
                'step'=>2
            ],[   // Date
                'name'  => 'release_date',
                'label' => 'Date of release',
                'type'  => 'date',
                'tab'=>'General Information',
                'hint'=>'mm/dd/yyyy',
                'create'=>true,
                'list'=>true,
                'order'=>60,
                'step'=>1
            ],[
                'label'     => "Data formats",
                'type'      => 'select2_multiple',
                'name'      => 'data_formats', // the method that defines the relationship in your Model

                // optional
                'entity'    => 'data_formats', // the method that defines the relationship in your Model
                'model'     => "App\Models\DataFormat", // foreign key model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'tab'=>'General Information',
                'exclude_from_form_save'=>true,
                'create'=>true,
                'order'=>70,
                'step'=>1
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
                'searchLogic'=>function($query, $column, $searchTerm){
                    return $query->orWhereHas('organization',function($query) use ($searchTerm){
                        $query->where('name','like','%'.$searchTerm.'%');
                    });
                },
                'tab'=>'General Information',
                'hint'=>'The person or entity responsible for creating the dataset',
                'create'=>true,
                'list'=>true,
                'order'=>80,
                'step'=>1
            ],[
                'type'=>'url',
                'name'=>'license_scheme',
                'label'=>'Licensing Scheme',
                'tab'=>'Description',
                'hint'=>'The terms and conditions under which the dataset can be used',
                'create'=>true,
                'order'=>90,
                'step'=>2
            ],[
                'type'=>'textarea',
                'label'=>'Data collection method',
                'name'=>'data_collection_method',
                'tab'=>'Description',
                'hint'=>'The way that the dataset was gathered, collected, or generated',
                'create'=>true,
                'order'=>100,
                'step'=>2
            ],[
                'type'=>'number',
                'label'=>'Version',
                'name'=>'version',
                'tab'=>'General Information',
                'hint'=>'The version or iteration of the dataset',
                'create'=>true,
                'order'=>110,
                'step'=>1
            ],[
                'type'=>'text',
                'label'=>'DOI/ ROR/ ISSN ',
                'name'=>'reference_link',
                'tab'=>'General Information',
                'create'=>true,
                'order'=>120,
                'hint'=>'A unique identifier for your dataset, making it easily citable. i.e https://doi.org/10.5281/zenodo.4555343',
                'step'=>1
            ],[
                'type'=>'text',
                'label'=>'OECD Frascati classification',
                'name'=>'oecd_frascati_classification',
                'tab'=>'Description',
                'hint'=>'The categorization of the dataset according to the OECD',
                'create'=>true,
                'order'=>130,
                'step'=>2
            ],[
                'type'=>'url',
                'label'=>'External data source',
                'name'=>'external_data_source',
                'create'=>true,
                'order'=>140,
                'tab'=>'Description',
                'hint'=>'Full url. Example: https://www.oecd.org/sti/inno/38235147.pdf',
                'step'=>2
            ],[
                'label'     => "Audiences",
                'type'      => 'select2_multiple',
                'name'      => 'audiences', // the method that defines the relationship in your Model
                // optional
                'entity'    => 'audiences', // the method that defines the relationship in your Model
                'model'     => "App\Models\Audience", // foreign key model
                'attribute' => 'name', // foreign key attribute that is shown to user
                'tab'=>'Description',
                'hint'=>'The intended audience or users of the dataset',
                'create'=>true,
                'exclude_from_form_save'=>true,
                'order'=>150,
                'step'=>2
            ],[
                'name'        => 'status',
                'label'       => "Status",
                'type'        => 'select_from_array',
                'options'     => Status::STATUS_LABELS_ARRAY,
                'allows_null' => false,
                'default'     => Status::STATUS_PUBLISHED,
                'create'=>true,
                'list'=>true,
                'order'=>300,
                'step'=>3
            ],[  // Select2
                'label'     => "Uploaded By",
                'type'      => 'select2',
                'list_type' => 'select',
                'name'      => 'uploaded_by', // the db column for the foreign key

                // optional
                'entity'    => 'uploadedBy', // the method that defines the relationship in your Model
                'model'     => "App\Models\User", // foreign key model
                'attribute' => 'name', // foreign key attribute that is shown to user
                // also optional
                'options'   => (function ($query) {
                    return $query->orderBy('name', 'ASC')->get();
                }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
                'searchLogic'=>function($query, $column, $searchTerm){
                    return $query->orWhereHas('uploadedBy',function($query) use ($searchTerm){
                        $query->where('name','like','%'.$searchTerm.'%');
                    });
                },
                'exclude_from_form_save'=>true,
                'order'=>310,
                'create'=>true,
                'list'=>true,
            ]
        ]);
    }

    public static function card_data(Dataset $dataset, $desc_limit=200): array
    {
        return [
            'vendor'=> 'datasets',
            'id'=>$dataset->dataset_id,
            'dataset_id'=>$dataset->dataset_id,
            'name'=> $dataset->name,
            'description'=> \Str::limit($dataset->description,$desc_limit),
            'status'=> $dataset->status,
            'keywords'=> $dataset->keywords->pluck('name'),
            'image'=>null,
            'update_date'=>$dataset->updated_at,
            'release_date'=>$dataset->created_at,
            'source'=>'datasets'
        ];
    }
}
