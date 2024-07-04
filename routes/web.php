<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouterController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('backoffice.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {

    //Package
    Route::get('/package', [PackageController::class, 'index'])->name('package.index');
    Route::get('/package/create', [PackageController::class, 'create'])->name('package.create');
    Route::post('/package/store', [PackageController::class, 'store'])->name('package.store');
    Route::get('/package/edit/{id}', [PackageController::class, 'edit'])->name('package.edit');
    Route::post('/package/update', [PackageController::class, 'update'])->name('package.update');
    Route::get('/package/{id}', [PackageController::class, 'destroy'])->name('package.destroy');


    //Router
    Route::get('/router', [RouterController::class, 'index'])->name('router.index');
    Route::get('/router/create', [RouterController::class, 'create'])->name('router.create');
    Route::post('/router/store', [RouterController::class, 'store'])->name('router.store');
    Route::get('/router/edit/{id}', [RouterController::class, 'edit'])->name('router.edit');
    Route::post('/router/update', [RouterController::class, 'update'])->name('router.update');
    Route::get('/router/{id}', [RouterController::class, 'destroy'])->name('router.destroy');


    //Customer
    Route::get('/customer', [CustomerController::class, 'index'])->name('customer.index');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customer.create');
    Route::post('/customer/store', [CustomerController::class, 'store'])->name('customer.store');
    Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
    Route::post('/customer/update', [CustomerController::class, 'update'])->name('customer.update');
    Route::get('/customer/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');

    Route::get('/packages/{router_id}', [RouterController::class, 'getPackagesByRouter']);

});

require __DIR__.'/auth.php';