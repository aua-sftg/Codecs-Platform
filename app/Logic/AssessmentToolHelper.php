<?php

namespace App\Logic;

use App\Interfaces\BackpackFieldsInterface;
use App\Models\AssessmentTool;
use App\Traits\BackpackFieldsTrait;
use Illuminate\Support\Collection;

class AssessmentToolHelper implements BackpackFieldsInterface
{
    use BackpackFieldsTrait;

    const VALIDATION_RULES = [
        'name' => 'required|string|max:255',
        'description' => 'required|string|min:10',
        'status' => 'required',
    ];

    /**
     *  Retrieve the active scenarios from the database order by lft asc and return the collection
     * Use the parameter $status to choose which scenarios you want(active, inactive, all)
     * @mike shall we cache this? to be discussed
     * @return Collection
     */
    public static function get_tools(string $status = Status::STATUS_PUBLISHED) : Collection
    {
        // Define a query builder for scenarios
        $query = AssessmentTool::query();

        in_array($status, [Status::STATUS_PUBLISHED, Status::STATUS_UNPUBLISHED])
            ? $query->where('status', $status)
            : null;

        // Order the scenarios by 'lft' in ascending order
        return $query->orderBy('lft', 'asc')->get();
    }

    /**
     *  The fields that are available for the create form and the list table.
     *  list_fields() and create_fields() are used in the BackpackFieldsTrait
     *  if list is true, it will be shown in the list table
     *  if create is true it will be shown in the create form
     *
     * @return Collection
     */
    public static function fields(): Collection
    {
        return collect([
            [
                'name'      => 'name',
                'type'=>'text',
                'label'     => 'Assessment Tool Name',
                'list'=>true,
                'create'=>true,
            ], [   // Text
                'name'  => 'slug',
                'target'  => 'name', // will turn the title input into a slug
                'label' => "Slug",
                'type'  => 'slug',
                'attributes' => [
                    'readonly'=> 'readonly'
                ],
                'create'=>true,
            ],[
                'name'      => 'description',
                'label'     => 'Description',
                'type'     => 'textarea',
                'list'=>false,
                'create'=>true,
            ],[
                'name'=>'country',
                'label'=>'Country',
                'type'=>'text',
                'list'=>true,
                'create'=>true,
            ],[   // Upload
                'name'      => 'image',
                'label'     => 'Image',
                'type'      => 'upload',
                'upload'=>true,
                'disk'=>'assessmenttools',
                'create'=>true
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
                'searchLogic'=>function($query, $column, $searchTerm){
                    return $query->orWhereHas('organization',function($query) use ($searchTerm){
                        $query->where('name','like','%'.$searchTerm.'%');
                    });
                },
                'tab'=>'General Information',
                'hint'=>'The person or entity responsible for creating the dataset',
                'create'=>true,
                'list'=>true
            ],[
                'name'      => 'file',
                'label'     => 'Assessment Tool File',
                'type'      => 'upload',
                'upload'    => true,
                'disk'      => 'assessmenttools',
                'create'    => true
            ],[
                'name'        => 'status',
                'label'       => "Status",
                'type'        => 'select_from_array',
                'options'     => Status::STATUS_LABELS_ARRAY,
                'allows_null' => false,
                'default'     => Status::STATUS_PUBLISHED,
                'create'=>true,
                'list'=>true,
            ],[
                'name'      => 'created_by',
                'label'     => 'Creator',
                'type'=>'text',
                'list'=>true,
                'create'=>false,
            ],[
                'name'      => 'lft',
                'type'=>'number',
                'label'     => 'Order',
                'list'=>true,
                'create'=>true,
            ],[   // Hidden
                'name'  => 'creator_id',
                'type'  => 'hidden',
                'value' => backpack_user()->id,
                'create'=>true
            ],
        ]);
    }

}
