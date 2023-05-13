<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TugasController;
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
Route::get('/dashboard-user', function () {
    return view('user.dashboard');
});
Route::get('/materi-user', function () {
    return view('user.materi');
});
Route::get('/jadwal-user', function () {
    return view('user.jadwal');
});

Route::get('/tugas-user', [TugasController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// ->middleware(['auth', 'verified'])->

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('/materis', \App\Http\Controllers\MateriController::class);
// Route::get('/', function () {
//     return view('materis.index');
// });

Route::get('getCourse/{id}', function ($id) {
    $course = App\Models\Kelas::where('kelas_id',$id)->get();
    return response()->json($course);
});
Route::resource('/tugas', \App\Http\Controllers\TugasController::class);
// Route::get('/', function () {
//     return view('tugas.index');


require __DIR__.'/auth.php';



