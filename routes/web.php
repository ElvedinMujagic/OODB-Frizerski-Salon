<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\StylistController;
use App\Http\Controllers\Admin\ServiceController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/Usluge', function () {
    return view('services');
})->name('services');

Route::get('/Naš-rad', function () {
    return view('our-work');
})->name('our-work');

Route::get('/O-nama', function () {
    return view('about');
})->name('about');

Route::get('/Kontakt', function () {
    return view('contact');
})->name('contact');

Route::get('/Zakažite-termin', function () {
    return view('book');
})->name('book');



Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::get('/client-dashboard', [DashboardController::class, 'clientDashboard'])
        ->name('client.dashboard')
        ->middleware('role:client');

    Route::get('/stylist-dashboard', [DashboardController::class, 'stylistDashboard'])
        ->name('stylist.dashboard')
        ->middleware('role:stylist');

    Route::get('/admin-dashboard', [DashboardController::class, 'adminDashboard'])
        ->name('admin.dashboard')
        ->middleware('role:admin');

    Route::post('/appointments', [AppointmentController::class, 'store'])
        ->name('appointments.store')
        ->middleware('role:client');

    Route::post('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])
        ->name('appointments.cancel')
        ->middleware('role:client');

    Route::put('/appointments/{appointment}', [AppointmentController::class, 'update'])
        ->name('appointments.update')
        ->middleware('role:stylist');

    Route::middleware('role:admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/stylists/create', [StylistController::class, 'create'])->name('stylists.create');
        Route::get('/stylists/delete', [StylistController::class, 'delete'])->name('stylists.delete');
        Route::post('/stylists/store', [StylistController::class, 'store'])->name('stylists.store');
        Route::get('/stylists/edit/{id}', [StylistController::class, 'edit'])->name('stylists.edit');
        Route::put('/stylists/update/{id}', [StylistController::class, 'update'])->name('stylists.update');
        Route::post('/stylists/destroy/{id}', [StylistController::class, 'destroy'])->name('stylists.destroy');

        Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
        Route::get('/services/create', [ServiceController::class, 'create'])->name('services.create');
        Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
        Route::get('/services/{service}/edit', [ServiceController::class, 'edit'])->name('services.edit');
        Route::put('/services/{service}', [ServiceController::class, 'update'])->name('services.update');
        Route::delete('/services/{service}', [ServiceController::class, 'destroy'])->name('services.destroy');
    });
});
