<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
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

Route::get('/', HomeController::class)->name('home'); // * Controlador invokable

Route::get('/dashboard', [VacantController::class, 'index'])->middleware(['auth', 'verified', 'rol.user'])->name('vacants.index');

Route::middleware(['auth', 'verified'])->prefix('vacants')->name('vacants.')->group(function () {
    Route::get('/create', [VacantController::class, 'create'])->name('create');
    Route::get('/{vacant}/edit', [VacantController::class, 'edit'])->name('edit');
    Route::get('/{vacant}', [VacantController::class, 'show'])->name('show');
});

Route::get('candidates/{vacant}', [CandidateController::class, 'index'])->name('candidates.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/notifications', NotificationController::class)->middleware(['auth', 'verified', 'rol.user'])->name('notifications');

require __DIR__.'/auth.php';
