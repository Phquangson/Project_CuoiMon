<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/'], function () {
    Route::get('/', [LoginController::class, 'index']);
});

Route::group(['prefix' => 'login'], function () {
    Route::get('/', [LoginController::class, 'index']);
    Route::get('/index', [LoginController::class, 'index']);
    Route::post('/postlogin', [LoginController::class, 'postlogin']);
});

Route::group(['prefix' => 'register'], function () {
    Route::get('/index', [RegisterController::class, 'index']);
    Route::post('/save', [RegisterController::class, 'save']);
});

Route::group(['prefix' => 'home'], function () {
    Route::get('/index', [HomeController::class, 'index']);
    // Route::post('/index', [HomeController::class, 'index']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

?>