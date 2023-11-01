<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [VacantController::class, 'index'])->middleware(['auth', 'verified'])->name('vacants.index');

Route::middleware(['auth', 'verified'])->prefix('vacants')->name('vacants.')->group(function () {
    Route::get('/create', [VacantController::class, 'create'])->name('create');
    Route::get('/{vacant}/edit', [VacantController::class, 'edit'])->name('edit');
    Route::get('/{vacant}', [VacantController::class, 'show'])->name('show');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
