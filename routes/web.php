<?php

use App\Http\Controllers\ProfileController;
use App\Logic\PermissionHelper;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home_page');
})->name('home');


Route::group(['prefix' => 'meta-inventory'], function () {
    // Route for Meta Inventory Home Page
    Route::get('/', function () {
        return view('components.metainventory.meta_inventory_home');
    })->name('meta_inventory_home');

    // Route for Meta Inventory Details
    Route::get('/details/{meta_inv_title}_{meta_inv_id}_{meta_inv_source}', [\App\Http\Controllers\MetaInventoryController::class, 'show'])->name('meta_inventory_detailed');

    // Route for Meta Inventory List by Scenario
    Route::get('/{scenario:slug}', [\App\Http\Controllers\MetaInventoryController::class, 'index'])->name('meta_inventory_list');
});

Route::group(['prefix' => 'inventory-of-datasets'], function(){
    // Route for Inventory Datasets List view
    Route::get('/', [\App\Http\Controllers\DatasetInventoryController::class, 'index'])->name('inventory_of_datasets');

    // Route for Meta Inventory Details
    Route::get('/details/{data_inv_title}_{data_inv_id}', [\App\Http\Controllers\DatasetInventoryController::class, 'show'])->name('dataset_inventory_detailed');
});

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/profile/favorites', [ProfileController::class, 'favorites'])->name('profile.favorites');

    Route::get('/datasets', [\App\Http\Controllers\DatasetController::class, 'index'])->name('datasets.index');
    Route::get('/datasets/form', [\App\Http\Controllers\DatasetController::class, 'form'])->name('datasets.form');
    Route::post('/datasets/form/save', [\App\Http\Controllers\DatasetController::class, 'save'])->name('datasets.form.save');
    Route::get('/datasets/form/{dataset}/edit', [\App\Http\Controllers\DatasetController::class, 'edit'])->name('datasets.form.edit');

    Route::post('/favorites/set', [\App\Http\Controllers\FavoritesController::class,'set'])->name('favorites.set');
});

Route::get('/cache',function(){
//    event(new \App\Events\ScenarioChanged(\App\Models\Scenario::find('65003d917e29494a6b0a90d2')));
    $scenario = \App\Models\Scenario::find('65003d917e29494a6b0a90d2');

    dump(\App\Logic\ScenarioHelper::get_results(scenario: $scenario,cache: true));
});

require __DIR__.'/auth.php';
