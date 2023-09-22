<?php

namespace App\Logic;

use App\Interfaces\BackpackFieldsInterface;
use App\Models\Scenario;
use App\Traits\BackpackFieldsTrait;
use Illuminate\Support\Collection;

class ScenarioHelper implements BackpackFieldsInterface
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
    public static function get_scenarios(string $status = Status::STATUS_ACTIVE) : Collection
    {
        // Define a query builder for scenarios
        $query = Scenario::query();

        in_array($status, [Status::STATUS_ACTIVE, Status::STATUS_INACTIVE])
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
                'label'     => 'Scenario Name',
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
                'options'     => Status::STATUS_LABELS_ARRAY,
                'allows_null' => false,
                'default'     => Status::STATUS_ACTIVE,
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
                'type'=>'text',
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

    public static function get_results(Scenario $scenario, bool $cache=true):Collection
    {

        if($cache && array($scenario->meta_inventory))
        {
            return MetaInventory::cached($scenario);
        }else{
            $criteria = MetaInventory::extractCriteria(
                json_decode($scenario->filters,true)
            );
            return MetaInventory::search(collect($criteria));
        }
    }
}
