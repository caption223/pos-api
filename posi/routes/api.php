<?php

use App\Http\Controllers\ItemController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix'=>'items'], function(){
    Route::get('/', [ItemController::class, 'index']);
    Route::post('/', [ItemController::class, 'store']);
    Route::get('/{item_id}', [ItemController::class, 'show']);
    Route::put('/{item_id}', [ItemController::class, 'update']);
    Route::delete('/{item_id}', [ItemController::class, 'destroy']);
});

Route::group(['prefix'=>'reports'], function(){
    Route::get('daily', [ItemController::class, 'daily']);
});