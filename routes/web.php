<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PresensiController;
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

Route::get('/materi-user', function () {
    return view('user.materi');
});
Route::get('/jadwal-user', function () {
    return view('user.jadwal');
});

Route::get('/dashboard-siswa', function () {
    return view('siswa.dashboard');
});


Route::get('/tugas-user', [TugasController::class, 'index']);

Route::get('/materi-siswa', function () {
    return view('siswa.materi');
});

Route::get('/jadwal-online-siswa', function () {
    return view('siswa.jadwal-online');
});

Route::get('/akses-kelas-basic-siswa', function () {
    return view('siswa.akses-kelas-basic');
});

Route::get('/akses-video-basic-siswa', function () {
    return view('siswa.akses-video-basic');
});

Route::get('/akses-kelas-intermediate-siswa', function () {
    return view('siswa.akses-kelas-intermediate');
});

Route::get('/akses-kelas-advance-siswa', function () {
    return view('siswa.akses-kelas-advance');
});


Route::get('/tugas-online-siswa', function () {
    return view('siswa.tugas-online');
});

Route::get('/materi-detail-siswa', function () {
    return view('siswa.materi-detail');
});

// ->middleware(['auth', 'verified'])->

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::prefix('/admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        });
        Route::resource('/admin', AdminController::class);
        // Route::group(['middleware' => ['role:admin']], function () {
        //     Route::resource('/admin', AdminController::class);
        // });
    });
    Route::prefix('/teacher')->group(function () {
        Route::group(['middleware' => ['role:teacher']], function () {
            Route::get('/dashboard', function () {
                return view('dashboard');
            })->name('dashboard');
            // Route::resource('/admin', AdminController::class);
        });
    });
    Route::group(['middleware' => ['role:student']], function () {
        Route::get('/dashboard-siswa', function () {
            return view('siswa.dashboard');
        });
    });
});

Route::resource('/materis', \App\Http\Controllers\MateriController::class);
// Route::get('/', function () {
//     return view('materis.index');
// });

Route::get('getCourse/{id}', function ($id) {
    $course = App\Models\Kelas::where('kelas_id', $id)->get();
    return response()->json($course);
});
Route::resource('/tugas', \App\Http\Controllers\TugasController::class);
Route::resource('/jadwal', \App\Http\Controllers\JadwalController::class);
Route::get('/jadwal/close/{$id}', [JadwalController::class, 'close'])->name('tutup');
Route::get('/jadwal/open/{$id}', [JadwalController::class, 'open'])->name('buka');
Route::post('/jadwal/simpan', [JadwalController::class, 'store'])->name('jadwal.store');

Route::prefix('presensi')->group(function () {
    Route::get('/get/{jadwalId}', [PresensiController::class, 'showByJadwalId']);
    Route::get('/{jadwalId}', [PresensiController::class, 'store']);
});
// Route::get('/', function () {
//     return view('tugas.index');


require __DIR__ . '/auth.php';
