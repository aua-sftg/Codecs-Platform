<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/sector', [App\Http\Controllers\Admin\SectorCrudController::class,'api_sectors']);
Route::post('/sector/{id}', [App\Http\Controllers\Admin\SectorCrudController::class,'api_sectors_show']);

Route::post('/keywords', [App\Http\Controllers\Admin\KeywordCrudController::class,'api_keywords']);
Route::post('/keywords/{id}', [App\Http\Controllers\Admin\KeywordCrudController::class,'api_keywords_show']);
