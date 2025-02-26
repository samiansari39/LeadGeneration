<?php

use App\Http\Controllers\ConfigController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('login'); });
Route::get('/login', function () { return view('login'); })->name('login');
Route::get('/forget-password', function () { return view('forget-password'); })->name('forget-password');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/app-chat', function () { return view('app-chat'); })->name('app-chat');
    Route::get('/app-calendar', function () { return view('app-calendar'); })->name('app-calendar');
    Route::get('/profile-setting', function () {return view('profile-setting'); })->name('profile-setting');

    Route::controller(SettingsController::class)->group(function (){
        Route::post('update-profile', 'updateProfile')->name('settings.updateProfile');
        Route::post('update-company', 'updateCompany')->name('settings.updateCompany');
        Route::post('update-password', 'updatePassword')->name('settings.updatePassword');
        Route::post('update-email', 'updateEmail')->name('settings.updateEmail');
    });

    // Route::controller(RegisteredUserController::class)->group(function () {
    //     Route::get('/register', function () { return view('register'); })->name('register');
    //     Route::post('/register', 'store')->name('register');
    // });

    Route::controller(UserController::class)->group(function () {
        Route::get('/all-users', 'index')->name('all-users');
        Route::delete('/users/{id}', 'destroy')->name('users.destroy');
    });

    Route::controller(ConfigController::class)->group(function () {
        Route::get('/view-hospital', 'viewHospital')->name('view-hospital');
        route::post('add-hospital','addHospital')->name('add-hospital');
    });

    /* ------------------------------ config routes ----------------------------- */



});

Route::controller(LoginController::class)->group(function () {
    Route::post('/login', 'authenticate')->name('login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(RegisteredUserController::class)->group(function () {
    Route::get('/register', function () { return view('register'); })->name('register');
    Route::post('/register', 'store')->name('register');
});
