<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CountryController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CityController;

Route::group(['middleware' => ['auth', 'language'] ], function(){

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/change-language/{lang}', function ($lang) {
        session()->put('locale', $lang);
        return redirect()->back();
    });

    Route::get('/test-route/{test_id}/show', [TestController::class, 'greet']);
    Route::get('/home', [TestController::class, 'home']);
    Route::get('/about-us', [TestController::class, 'about']);

    Route::get('/contact', [TestController::class, 'showContactPage']);
    Route::post('/contact', [TestController::class, 'sendMessage']);
    Route::put('/contact', [TestController::class, 'updateMessage']);
    Route::delete('/contact', [TestController::class, 'deleteMessage']);

    Route::resource('/cities', CityController::class);
    Route::resource('/countries', CountryController::class);
    Route::resource('/contacts', ContactController::class);


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');

    require __DIR__ . '/auth.php';
});

