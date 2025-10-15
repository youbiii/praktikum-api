    <?php

    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\FakultasController;
    use App\Http\Controllers\ProdiController;

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

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
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







    Route::get('/profile', function () {
        return view('profile');
    });
    Route::get('/data', function () {
        return view('data');
    });
