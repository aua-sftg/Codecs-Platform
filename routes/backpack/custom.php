<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('user', 'UserCrudController');
    Route::crud('scenario', 'ScenarioCrudController');

    Route::post('/run-query',[App\Http\Controllers\Admin\ScenarioCrudController::class,'run_query'])->name('run-query');
    Route::crud('dataset', 'DatasetCrudController');
    Route::crud('audience', 'AudienceCrudController');
    Route::crud('data-format', 'DataFormatCrudController');
    Route::crud('organization', 'OrganizationCrudController');
    Route::crud('sector', 'SectorCrudController');
    Route::crud('keyword', 'KeywordCrudController');
    Route::crud('permission', 'PermissionCrudController');
}); // this should be the absolute last line of this file
