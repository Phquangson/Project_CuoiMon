<?php

use App\Http\Controllers\EmailsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\VerificationController;

Route::group(['prefix' => '/'], function () {
    Route::get('/', [LoginController::class, 'index']);
});

Route::group(['prefix' => 'login'], function () {
    Route::get('/', [LoginController::class, 'index']);
    Route::get('/index', [LoginController::class, 'index'])->name('login');
    Route::post('/postlogin', [LoginController::class, 'postlogin']);
});

Route::group(['prefix' => 'register'], function () {
    Route::get('/index', [RegisterController::class, 'index']);
    Route::post('/save', [RegisterController::class, 'save']);
});



Route::group(['prefix' => 'login_admin'], function () {
    Route::get('/index', [LoginAdminController::class, 'index']);
});

Route::middleware('auth:admin')->prefix('template_admin')->group(function () {
    Route::get('/dashboard', [TemplateController::class, 'dashboard']);
    Route::get('/icon', [TemplateController::class, 'icon']);
    Route::get('/maps', [TemplateController::class, 'maps']);
    Route::get('/notifications', [TemplateController::class, 'notifications']);
    Route::get('/user_people', [TemplateController::class, 'user_people']);
    Route::get('/table_list', [TemplateController::class, 'table_list']);
    Route::get('/typography', [TemplateController::class, 'typography']);
    Route::get('/upgrade', [TemplateController::class, 'upgrade']);
});

Route::get('/login/index', [LoginController::class, 'index'])->name('login');

Route::post('/login_admin/index', [LoginAdminController::class, 'login'])->name('admin.login');

Route::post('/admin/logout', [LoginAdminController::class, 'logout'])->name('admin.logout');

Route::get('/send-mail', [EmailsController::class, 'WelcomeEmail']);

Route::get('/email/verify', [VerificationController::class, 'notice'])
    ->middleware('auth')
    ->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['signed'])
    ->name('verification.verify');

Route::post('/email/verification-notification', [VerificationController::class, 'resend'])
    ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.resend');

Route::get('/home/index', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified']);
