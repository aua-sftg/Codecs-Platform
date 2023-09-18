<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\KeywordRequest;
use App\Logic\Agrovoc;
use App\Logic\KeywordHelper;
use App\Models\Keyword;
use App\Models\Sector;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;

/**
 * Class KeywordCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class KeywordCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Keyword::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/keyword');
        CRUD::setEntityNameStrings('keyword', 'keywords');
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
            return Keyword::select('source')->pluck('source','source')->toArray();
        }, function ($value) { // if the filter is active
            $this->crud->addClause('where', 'source', $value);
        });
        $this->crud->addColumns(KeywordHelper::list_fields());
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(KeywordHelper::VALIDATION_RULES);

        $this->crud->addFields(KeywordHelper::create_fields());
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

    public function api_keywords(Request $request)
    {
        $keyword = $request->q;
        $dbKeywords = Keyword::select('id','name')->where("name","LIKE","%$keyword%")->get();

        $results = Agrovoc::search(keyword: $keyword, except: $dbKeywords->pluck('name')->toArray());

        $dbKeywords->map(function ($dbKeyword) use ($results) {
            $results->push([
                '_id' => json_encode([
                    'vendor'=>'db',
                    'id'=>$dbKeyword->id,
                    'url'=>'',
                    'label'=>$dbKeyword->name,
                    'new'=>false,
                ]),
                'name' => $dbKeyword->name
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
}
