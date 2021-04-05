<?php

use App\Http\Controllers\API\ContactController;
use App\Http\Controllers\AuthController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', function(){
    return ['status' => "OK" ];
});

Route::get('/contacts', [ContactController::class, 'getContacts'] )->middleware(['auth:api']);
Route::get('/contacts-by-city', [ContactController::class, 'getContactsByCity'] )->middleware(['auth:api']);
Route::post('/contacts', [ContactController::class, 'saveContact'] )->middleware(['auth:api']);
Route::put('/contacts/{contact}', [ContactController::class, 'updateContact'] )->middleware(['auth:api']);
Route::delete('/contacts/{contact}', [ContactController::class, 'deleteContact'] )->middleware(['auth:api']);

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

});
