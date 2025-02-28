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
        /* ----------------------------- hospital routes ---------------------------- */
        Route::get('/view-hospital', 'viewHospital')->name('view-hospital');
        route::post('add-hospital','addHospital')->name('add-hospital');
        route::post('edit-hospital','editHospital')->name('edit-hospital');
        route::get('delete-hospital/{id}','deleteHospital')->name('delete-hospital');
        /* ------------------------- equipment group routes ------------------------- */
        Route::get('/view-equipment-group', 'viewEquipmentGroup')->name('view-equipment-group');
        route::post('add-equipment-group','addEquipmentGroup')->name('add-equipment-group');
        route::post('edit-equipment-group','editEquipmentGroup')->name('edit-equipment-group');
        route::get('delete-equipment-group/{id}','deleteEquipmentGroup')->name('delete-equipment-group');
        /* ---------------------------- equipment routes ---------------------------- */
        Route::get('/view-equipment', 'viewEquipment')->name('view-equipment');
        route::post('/add-equipment','addEquipment')->name('add-equipment');
        route::post('/edit-equipment','editEquipment')->name('edit-equipment');
        route::get('/delete-equipment/{id}','deleteEquipment')->name('delete-equipment');
        /* --------------------------- supply group routes -------------------------- */
        Route::get('/view-supply-group', 'viewSupplyGroup')->name('view-supply-group');
        route::post('/add-supply-group','addSupplyGroup')->name('add-supply-group');
        route::post('/edit-supply-group','editSupplyGroup')->name('edit-supply-group');
        route::get('/delete-supply-group/{id}','deleteSupplyGroup')->name('delete-supply-group');
        /* ----------------------------- supplies routes ---------------------------- */
        Route::get('/view-supplies', 'viewSupplies')->name('view-supplies');
        route::post('/add-supplies','addSupplies')->name('add-supplies');

        route::post('/update-supplies','editSupplies')->name('update-supplies');
        route::get('/delete-supplies/{id}','deleteSupplies')->name('delete-supplies');
        /* ------------------------------ staff routes ------------------------------ */
        Route::get('/view-staff', 'viewStaff')->name('view-staff');
        route::post('/add-staff','addStaff')->name('add-staff');
        route::post('/edit-staff','editStaff')->name('edit-staff');
        route::get('/delete-staff/{id}','deleteStaff')->name('delete-staff');
      
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
