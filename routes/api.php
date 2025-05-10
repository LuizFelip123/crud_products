<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
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
Route::get('/test', function(){
    $response = new Response(json_encode(['msg'=> 'Minha primeira resposta de API']));
    $response->header('Content-Type', 'application/json');
    return $response;
});



    Route::prefix('products')->group(function(){

    Route::get('/', [ProductController::class, 'index']);//->middleware('auth.basic');
    Route::post('/',[ProductController::class, 'store']);
    Route::get('/{id}',[ProductController::class, 'show']);
    Route::put('/', [ProductController::class, 'update']);
    Route::delete('/{id}',[ProductController::class, 'delete']);

});

  Route::resource('/users', UserController::class);


