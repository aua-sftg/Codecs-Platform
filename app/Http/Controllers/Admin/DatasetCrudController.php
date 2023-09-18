<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\DatasetRequest;
use App\Logic\ArticleHelper;
use App\Logic\DatasetHelper;
use App\Logic\KeywordHelper;
use App\Logic\MediaHelper;
use App\Logic\SectorHelper;
use App\Models\Dataset;
use App\Models\Media;
use App\Models\Sector;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;
use Prologue\Alerts\Facades\Alert;

/**
 * Class DatasetCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class DatasetCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation{store as traitStore;}
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation{update as traitUpdate;}
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Dataset::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/dataset');
        CRUD::setEntityNameStrings('dataset', 'datasets');
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->addColumns(DatasetHelper::list_fields());
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(DatasetHelper::VALIDATION_RULES);

        $this->crud->addFields(DatasetHelper::create_fields());
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

    public function store(Request $request)
    {
        $this->crud->validateRequest();

        try {
            \DB::beginTransaction();
            //run default update method
            $response = $this->traitStore();

            if ($this->crud->entry != null) {
                $this->crud->entry->sector()->sync(
                    SectorHelper::getSectorIDS(
                        $request->get('sector',[])
                    )
                );

                $this->crud->entry->keywords()->sync(
                    KeywordHelper::getKeywordIDS(
                        $request->get('keywords',[])
                    )
                );
            }


            \DB::commit();
        }catch (\Exception $e)
        {
            \DB::rollBack();
            Alert::error(trans('backpack::base.error_saving'))->flash();
        }

        return $response??null;
    }

    public function update(Request $request)
    {
        $this->crud->validateRequest();

        try {
            \DB::beginTransaction();
            //run default update method
            $response = $this->traitUpdate();

            $dataset = Dataset::findOrFail($request->get('_id'));

            $dataset->sector()->sync(
                SectorHelper::getSectorIDS(
                    $request->get('sector',[])
                )
            );

            $dataset->keywords()->sync(
                KeywordHelper::getKeywordIDS(
                    $request->get('keywords',[])
                )
            );

            \DB::commit();
        }catch (\Exception $e)
        {
            \DB::rollBack();
            Alert::error(trans('backpack::base.error_saving'))->flash();
        }

        return $response??null;
    }

}
