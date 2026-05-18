<?php

namespace App\Http\Controllers\Admin;

use App\Models\RoleSelection;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Library\Widget;

class RoleSelectionCrudController extends CrudController
{
    use ListOperation;

    public function setup()
    {
        CRUD::setModel(RoleSelection::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/role-selection');
        CRUD::setEntityNameStrings('role selection', 'role selections');

        CRUD::denyAccess(['create', 'update', 'delete']);
    }

    protected function setupListOperation()
    {
        // Stats widget showing counts per role
        $counts = RoleSelection::raw(function ($collection) {
            return $collection->aggregate([
                ['$group' => ['_id' => '$role', 'count' => ['$sum' => 1]]],
                ['$sort'  => ['count' => -1]],
            ])->toArray();
        });

        Widget::add([
            'type'  => 'view',
            'view'  => 'admin.role-selection-stats',
            'stats' => $counts,
        ])->to('before_content');

        CRUD::column('role')->label('Role');
        CRUD::column('session_id')->label('Session ID');
        CRUD::column('created_at')->label('Submitted At')->type('datetime');
    }
}
