<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CityController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test-route/{test_id}/show', [TestController::class, 'greet']);
Route::get('/home', [TestController::class, 'home']);
Route::get('/about-us', [TestController::class, 'about']);

Route::get('/contact', [TestController::class, 'showContactPage']);
Route::post('/contact', [TestController::class, 'sendMessage']);
Route::put('/contact', [TestController::class, 'updateMessage']);
Route::delete('/contact', [TestController::class, 'deleteMessage']);

Route::resource('/cities', CityController::class);