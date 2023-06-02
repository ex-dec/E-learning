<?php

use App\Http\Controllers\Admin\TeacherUserController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PresensiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TugasController;
use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::name('admin.')->prefix('/admin')->group(function () {
        Route::group(['middleware' => ['role:admin,web']], function () {
            Route::get('/dashboard', function () {
                return view('dashboard');
            })->name('dashboard');
            Route::resource('/teacher', TeacherUserController::class);
        });
    });
    Route::name('teacher.')->prefix('/teacher')->group(function () {
        Route::group(['middleware' => ['role:teacher,web']], function () {
            Route::get('/dashboard', function () {
                return view('dashboard');
            })->name('dashboard');
            Route::resource('/schedule', App\Http\Controllers\Teacher\ScheduleController::class);
            Route::get('/schedule/open/{schedule}', [App\Http\Controllers\Teacher\ScheduleController::class, 'open'])->name('schedule.open');
            Route::get('/schedule/close/{schedule}', [App\Http\Controllers\Teacher\ScheduleController::class, 'close'])->name('schedule.close');
            Route::resource('/material', App\Http\Controllers\Teacher\MaterialController::class);
            Route::resource('/task', App\Http\Controllers\Teacher\TaskController::class);
        });
    });
    Route::name('student.')->prefix('/student')->group(function () {
        Route::group(['middleware' => ['role:student,web']], function () {
            Route::get('/dashboard', [App\Http\Controllers\Student\DashboardController::class, 'index'])->name('dashboard');
            Route::name('material')->prefix('/material')->group(function () {
                Route::get('', [App\Http\Controllers\Student\MaterialController::class, 'index'])->name('');
                Route::name('.basic.')->prefix('/basic')->group(function () {
                });
                Route::name('.intermediate.')->prefix('/intermediate')->group(function () {
                });
                Route::name('.advance.')->prefix('/advance')->group(function () {
                });
            });
            Route::name('course')->prefix('/course')->group(function () {
                Route::name('.basic')->prefix('/basic')->group(function () {
                    Route::get('', [App\Http\Controllers\Student\CourseController::class, 'basicDashboard'])->name('');
                    Route::get('/material', [App\Http\Controllers\Student\CourseController::class, 'basicMaterial'])->name('.material');
                });
                Route::name('.intermediate')->prefix('/intermediate')->group(function () {
                    Route::get('', [App\Http\Controllers\Student\CourseController::class, 'intermediateDashboard'])->name('');
                    Route::get('/material', [App\Http\Controllers\Student\CourseController::class, 'intermediateMaterial'])->name('.material');
                });
                Route::name('.advance')->prefix('/advance')->group(function () {
                    Route::get('', [App\Http\Controllers\Student\CourseController::class, 'advanceDashboard'])->name('');
                    Route::get('/material', [App\Http\Controllers\Student\CourseController::class, 'advanceMaterial'])->name('.material');
                });
            });
            Route::name('schedule')->prefix('/schedule')->group(function () {
                Route::get('', [App\Http\Controllers\Student\ScheduleController::class, 'index'])->name('');
            });
        });
    });
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



Route::get('getCourse/{id}', function ($id) {
    $course = App\Models\Grade::where('grade_id', $id)->get();

    return response()->json($course);
});

Route::prefix('presensi')->group(function () {
    Route::get('/get/{jadwalId}', [PresensiController::class, 'showByJadwalId']);
    Route::get('/{jadwalId}', [PresensiController::class, 'store']);
});
// Route::get('/', function () {
//     return view('tugas.index');

require __DIR__ . '/auth.php';
