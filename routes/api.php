<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\api\blogController;

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



// Route::get('Blog','api\blogController@index');
// Route::post('Blog/create','api\blogController@store');
// Route::get('Blog/{id}','api\blogController@edit');

// Route::get('Blog',[blogController::class , 'index']);

Route::apiResource('Blog','api\blogController');
/*
   /Blog           (get)    =    Route::get('Blog',[blogController::class, 'index']);
   /Blog           (post)   =    Route::post('Blog',[blogController::class, 'store']);
   /Blog/{id}      (put)    =    Route::put('Blog/{id}',[blogController::class, 'update']);
   /Blog/{id}      (delete) =    Route::delete('Blog/{id}',[blogController::class, 'destroy']);
   /Blog/{id}      (get)    =    Route::get('Blog/{id}',[blogController::class, 'show']);
*/



Route::get('message','api\blogController@message');
