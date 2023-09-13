<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/meta-inventory', function () {
    return view('meta_inventory_home');
})->name('meta_inventory_home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/cache',function(){
//    event(new \App\Events\ScenarioChanged(\App\Models\Scenario::find('65003d917e29494a6b0a90d2')));
    $scenario = \App\Models\Scenario::find('65003d917e29494a6b0a90d2');

    dump(\App\Logic\ScenarioHelper::get_results(scenario: $scenario,cache: true));
});

require __DIR__.'/auth.php';
