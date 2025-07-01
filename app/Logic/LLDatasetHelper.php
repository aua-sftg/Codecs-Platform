<?php

namespace App\Logic;

use App\Interfaces\BackpackFieldsInterface;
use App\Models\LLDataset;
use App\Traits\BackpackFieldsTrait;
use Illuminate\Support\Collection;

class LLDatasetHelper implements BackpackFieldsInterface
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
        $query = LLDataset::query();

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
                'label'     => 'Name of the digital technology/solution',
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
                'name'      => 'llcountry',
                'type'=>'text',
                'label'     => 'Living Lab Dataset Country',
                'list'=>false,
                'create'=>true,
            ],[
                'name'      => 'llname',
                'type'=>'text',
                'label'     => 'Name of the Living Lab',
                'list'=>false,
                'create'=>true,
            ],[
                'name'      => 'keywords',
                'type'      => 'text',
                'label'     => 'Keywords related with your digital technology/solution (write at least 3 comma-separated)',
                'list'      => false,
                'create'    => true,
            ],[
                'name'      => 'type',
                'type'=>'text',
                'label'     => 'Type of the technology/solution (UAV, sensor, mobile app, etc)',
                'list'=>false,
                'create'=>true,
            ],[
                'name'      => 'targetusers',
                'type'=>'text',
                'label'     => 'Target users',
                'list'=>false,
                'create'=>true,
            ],[
                'name'      => 'appscenarios',
                'type'=>'text',
                'label'     => 'Application scenarios (can be more than one)',
                'list'=>false,
                'create'=>true,
            ],[
                'name'      => 'agrsectors',
                'type'=>'text',
                'label'     => 'Agricultural sector',
                'list'=>false,
                'create'=>true,
            ],[
                'name'      => 'link',
                'type'=>'text',
                'label'     => 'Link to the solution on the web (if exists)',
                'list'=>false,
                'create'=>true,
            ],[
                'name'      => 'skilllvl',
                'type'=>'text',
                'label'     => 'Required skills level for technology/solution usage',
                'list'=>false,
                'create'=>true,
            ],[
                'name'      => 'components',
                'type'=>'text',
                'label'     => 'Digital solution/technology components (software, hardware, connectors, sensors, satellite, etc)',
                'list'=>false,
                'create'=>true,
            ],[
                'name'      => 'origincountry',
                'type'=>'text',
                'label'     => 'Country of origin of the digital solution/technology',
                'list'=>false,
                'create'=>true,
            ],[   // Upload
                'name'      => 'images',
                'label'     => 'Images',
                'type'      => 'upload_multiple',
                'upload'=>true,
                'disk'=>'lldatasets',
                'create'=>true
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
