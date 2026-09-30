<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SectorRequest;
use App\Logic\Agrovoc;
use App\Logic\SectorHelper;
use App\Models\Sector;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;

/**
 * Class SectorCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SectorCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Sector::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/sector');
        CRUD::setEntityNameStrings('sector', 'sectors');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {


        $this->crud->addFilter([
            'name'  => 'source',
            'type'  => 'select2',
            'label' => 'Source'
        ], function () {
            return Sector::select('source')->pluck('source','source')->toArray();
        }, function ($value) { // if the filter is active
             $this->crud->addClause('where', 'source', $value);
        });

        $this->crud->addColumns(SectorHelper::list_fields());
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SectorHelper::VALIDATION_RULES);

        $this->crud->addFields(SectorHelper::create_fields());
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }

    public function api_sectors(Request $request)
    {
        $keyword = $request->q;
        $dbSectors = Sector::select('id','name')->where("name","LIKE","%$keyword%")->get();

        $results = Agrovoc::search(keyword: $keyword, except: $dbSectors->pluck('name')->toArray());

        $dbSectors->map(function ($sector) use ($results) {
            $results->push([
                '_id' => json_encode([
                    'vendor'=>'db',
                    'id'=>$sector->id,
                    'url'=>'',
                    'label'=>$sector->name,
                    'new'=>false,
                ]),
                'name' => $sector->name
            ]);
        });

        $results->push([
            '_id' => json_encode([
                'vendor'=>'user',
                'url'=>'',
                'label'=>$keyword,
                'new'=>true,
            ]),
            'name' => $keyword.' (create this)'
        ]);


        return response()->json(
            $results->toArray()
        );
    }

    public function api_sectors_show($id)
    {
        return Sector::find($id);
    }
}
