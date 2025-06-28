<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/'], function () {
    Route::get('/', [LoginController::class, 'index']);
});

Route::group(['prefix' => '/'], function () {
    Route::get('/', [LoginController::class, 'index']);
    Route::get('/index', [LoginController::class, 'index']);
});

Route::group(['prefix' => 'register'], function () {
    Route::get('/index', [RegisterController::class, 'index']);
});

?>