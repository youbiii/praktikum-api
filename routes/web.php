<?php

use App\Http\Controllers\DashboardController;
<<<<<<< HEAD
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProdiController;
=======
>>>>>>> 2d4ddbc95a926ccc27f10945dc80b19de5f6d7a6
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

<<<<<<< HEAD
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');;

Route::get('/fakultas', [FakultasController::class, 'index'])->name('fakultas.index');
Route::get('/fakultas/create', [FakultasController::class, 'create'])->name('fakultas.create');
Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
=======
Route::get('/', [DashboardController::class, 'index']);
>>>>>>> 2d4ddbc95a926ccc27f10945dc80b19de5f6d7a6






Route::get('/profile', function () {
    return view('profile');
});
Route::get('/data', function () {
    return view('data');
});
