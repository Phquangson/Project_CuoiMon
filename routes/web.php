<?php

use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'register'], function () {
    Route::get('/index', [RegisterController::class, 'index']);
});

?>