<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KrsController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/photo', [ProfileController::class, 'updatePhoto'])->name('profile.update.photo');

    // ====================================================================
    // ===== RUTE DATA MANAGEMENT (HANYA BISA DIAKSES JIKA LOGIN) =====
    // ====================================================================
    Route::resource('fakultas', FakultasController::class);
    Route::resource('prodi', ProdiController::class);
    Route::resource('dosen', DosenController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
    Route::resource('jabatan', JabatanController::class);
    Route::resource('matakuliah', MatakuliahController::class);
    // ====================================================================
});
// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
// Fakultas Routes
Route::get('/fakultas', [FakultasController::class, 'index'])->name('fakultas.index');
Route::get('/fakultas/create', [FakultasController::class, 'create'])->name('fakultas.create');
Route::post('/fakultas', [FakultasController::class, 'store'])->name('fakultas.store');
Route::get('/fakultas/{id}', [FakultasController::class, 'show'])->name('fakultas.show');
Route::get('/fakultas/{id}/edit', [FakultasController::class, 'edit'])->name('fakultas.edit');
Route::put('/fakultas/{id}', [FakultasController::class, 'update'])->name('fakultas.update');
Route::delete('/fakultas/{id}', [FakultasController::class, 'destroy'])->name('fakultas.destroy');

// Prodi Routes
Route::get('/prodi', [ProdiController::class, 'index'])->name('prodi.index');
Route::get('/prodi/create', [ProdiController::class, 'create'])->name('prodi.create');
Route::post('/prodi', [ProdiController::class, 'store'])->name('prodi.store');
Route::get('/prodi/{id}', [ProdiController::class, 'show'])->name('prodi.show');
Route::get('/prodi/{id}/edit', [ProdiController::class, 'edit'])->name('prodi.edit');
Route::put('/prodi/{id}', [ProdiController::class, 'update'])->name('prodi.update');
Route::delete('/prodi/{id}', [ProdiController::class, 'destroy'])->name('prodi.destroy');

// dosen Routes
Route::resource('dosen', DosenController::class);
Route::get('dosens/{dosen}/export/excel', [DosenController::class, 'exportExcel'])->name('dosen.export.excel');
Route::get('dosens/{dosen}/export/pdf', [DosenController::class, 'exportPdf'])->name('dosen.export.pdf');
// jabatan routes
Route::resource('jabatan', JabatanController::class);

// mahasiswa route
Route::resource('mahasiswa', MahasiswaController::class);
Route::get('mahasiswa/{mahasiswa}/export/excel', [MahasiswaController::class, 'exportExcel'])->name('mahasiswa.export.excel');
Route::get('mahasiswa/{mahasiswa}/export/pdf', [MahasiswaController::class, 'exportPdf'])->name('mahasiswa.export.pdf');


// matakuliah
Route::resource('matakuliah', MatakuliahController::class);

// Rute untuk KRS Mahasiswa
// Kita akan buat URL kustom karena logic-nya tidak standar CRUD
// Route::get('/krs', [KrsController::class, 'index'])->name('krs.index');
// Route::post('/krs/tambah', [KrsController::class, 'store'])->name('krs.store');
// Route::delete('/krs/hapus/{krs}', [KrsController::class, 'destroy'])->name('krs.destroy');
Route::resource('krs', KrsController::class);


require __DIR__ . '/auth.php';
