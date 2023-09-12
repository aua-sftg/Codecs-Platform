<?php

namespace App\Logic;

use App\Interfaces\BackpackFieldsInterface;
use App\Traits\BackpackFieldsTrait;
use Illuminate\Support\Collection;
use App\Models\Scenario;

class ScenarioHelper implements BackpackFieldsInterface
{
    use BackpackFieldsTrait;

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';

    const STATUS_LABELS_ARRAY = [
        self::STATUS_ACTIVE => 'Active',
        self::STATUS_INACTIVE => 'Inactive',
    ];

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
    public static function get_scenarios($status = 'active') : Collection
    {
        // Define a query builder for scenarios
        $query = Scenario::query();

        // Conditionally add a where clause for status
        if ($status === 'active') {
            $query->where('status', 'active');
        } elseif ($status === 'inactive') {
            $query->where('status', 'inactive');
        }

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
                'label'     => 'Scenario Name',
                'list'=>true,
                'create'=>true,
            ],[
                'name'      => 'description',
                'label'     => 'Description',
                'type'     => 'textarea',
                'list'=>false,
                'create'=>true,
            ],[   // Upload
                'name'      => 'image',
                'label'     => 'Image',
                'type'      => 'upload',
                'upload'=>true,
                'disk'=>'scenarios',
                'create'=>true
            ],[
                'name'=>'filters',
                'type'=>'scenario_creator_field',
                'label'=>'Filters',
                'create'=>true,
                'list'=>false,
            ],[
                'name'        => 'status',
                'label'       => "Status",
                'type'        => 'select_from_array',
                'options'     => self::STATUS_LABELS_ARRAY,
                'allows_null' => false,
                'default'     => self::STATUS_ACTIVE,
                'create'=>true,
                'list'=>true,
            ],[
                'name'      => 'created_by',
                'label'     => 'Creator',
                'list'=>true,
                'create'=>false,
            ],[
                'name'      => 'lft',
                'label'     => 'Order',
                'list'=>true
            ],[   // Hidden
                'name'  => 'creator_id',
                'type'  => 'hidden',
                'value' => backpack_user()->id,
                'create'=>true
            ],
        ]);
    }
}
