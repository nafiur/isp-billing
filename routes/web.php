<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;

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
    Route::get('/package', [PackageController::class, 'index'])->name('package.index');
    Route::get('/package/create', [PackageController::class, 'create'])->name('package.create');
    Route::post('/package/store', [PackageController::class, 'store'])->name('package.store');

    Route::get('/router', [RouterController::class, 'index'])->name('router.index');
});

require __DIR__.'/auth.php';