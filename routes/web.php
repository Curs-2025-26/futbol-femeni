<?php

use App\Http\Controllers\EquipController;
use App\Http\Controllers\EstadiController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RoleMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', RoleMiddleware::class.':administrador' ])->group(function (){
    Route::resource('/equips', EquipController::class)->except(['index', 'show']);
    Route::resource('/estadis', EstadiController::class)->except(['index', 'show']);
});
Route::resource('/equips', EquipController::class)->only(['index', 'show']);
Route::resource('/estadis', EstadiController::class)->only(['index', 'show']);

require __DIR__.'/auth.php';
