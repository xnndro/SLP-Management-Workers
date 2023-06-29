<?php

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
    return view('auth.login');
});

// Route::get('/workersEdit/{id}', [App\Http\Controllers\TaskSubmissionController::class, 'workersEdit'])->name('workersEdit');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/editInventaris/{id}', [App\Http\Controllers\InventarisController::class, 'editInventaris'])->name('editInventaris');
    Route::post('/updateInventaris/{id}', [App\Http\Controllers\InventarisController::class, 'updateInventaris'])->name('updateInventaris');
    Route::get('/deleteInventaris/{id}', [App\Http\Controllers\InventarisController::class, 'deleteInventaris'])->name('deleteInventaris');

    Route::get('/keluhan/ulasan', [App\Http\Controllers\KeluhanController::class, 'ulasan'])->name('keluhanShowFeedback');

    Route::group(['middleware' => ['supervisor']], function () {
        // Disini nanti semua route yang hanya bisa diakses oleh supervisor
        // * Supervisor -> Jadwal
        // * Supervisor -> Jadwal -> Tugas
        Route::get('/schedule', [App\Http\Controllers\TaskSubmissionController::class, 'schedule'])->name('schedule');
        Route::post('/scheduleUpload', [App\Http\Controllers\TaskSubmissionController::class, 'scheduleUpload'])->name('scheduleUpload');
        Route::post('/scheduleEdit/{id}', [App\Http\Controllers\TaskSubmissionController::class, 'scheduleEdit'])->name('scheduleEdit');
        Route::delete('/scheduleDelete/{id}', [App\Http\Controllers\TaskSubmissionController::class, 'scheduleDelete'])->name('scheduleDelete');

        // * Supervisor -> Jadwal -> workers
        Route::get('/workers', [App\Http\Controllers\TaskSubmissionController::class, 'workers'])->name('workers');
        Route::get('/workersCreate', [App\Http\Controllers\TaskSubmissionController::class, 'workersCreate'])->name('workersCreate');
        Route::get('/workersEdit', [App\Http\Controllers\TaskSubmissionController::class, 'workersEdit'])->name('workersEdit');
        Route::post('/workersUpdate/{id}', [App\Http\Controllers\TaskSubmissionController::class, 'workersUpdate'])->name('workersUpdate');
        Route::get('/workersDelete/{id}', [App\Http\Controllers\TaskSubmissionController::class, 'workersDelete'])->name('workersDelete');
        Route::get('/workersSchedule', [App\Http\Controllers\TaskSubmissionController::class, 'workersSchedule'])->name('workersSchedule');

        // * Supervisor -> Jadwal -> Laporan
        Route::get('/tasksReport', [App\Http\Controllers\TaskSubmissionController::class, 'tasksReport'])->name('tasksReport');

        // * Supervisor -> Cuti
        Route::get('/requestList', [App\Http\Controllers\PaidLeaveController::class, 'requestList'])->name('requestList');
        Route::get('/paidLeaveList', [App\Http\Controllers\PaidLeaveController::class, 'paidLeaveList'])->name('paidLeaveList');
        Route::get('/kategoriCuti', [App\Http\Controllers\PaidLeaveController::class, 'kategoriCuti'])->name('kategoriCuti');
        Route::get('/lihat_detail', [App\Http\Controllers\PaidLeaveController::class, 'lihat_detail'])->name('lihat_detail');
        Route::get('/paidLeaveCategory', [App\Http\Controllers\PaidLeaveController::class, 'paidLeaveCategory'])->name('paidLeaveCategory');

        // * Supervisor -> Panduan
        Route::get('/supervisorPanduan', [App\Http\Controllers\PanduanController::class, 'supervisorPanduan'])->name('supervisorPanduan');
        Route::get('/createPanduan', [App\Http\Controllers\PanduanController::class, 'createPanduan'])->name('createPanduan');
        Route::post('/createPanduanStore', [App\Http\Controllers\PanduanController::class, 'add'])->name('addPanduan');
        Route::get('/supervisorDetailPanduan/{id}', [App\Http\Controllers\PanduanController::class, 'supervisorDetailPanduan'])->name('supervisorDetailPanduan');
        Route::get('/editPanduan/{id}', [App\Http\Controllers\PanduanController::class, 'editPanduan'])->name('editPanduan');
        Route::post('/updatePanduan/{id}', [App\Http\Controllers\PanduanController::class, 'updatePanduan'])->name('updatePanduan');
        Route::get('/deletePanduan/{id}', [App\Http\Controllers\PanduanController::class, 'deletePanduan'])->name('deletePanduan');

        // * Supervisor -> Inventaris
        Route::get('/supervisorInventaris', [App\Http\Controllers\InventarisController::class, 'supervisorInventaris'])->name('supervisorInventaris');
        Route::get('/createInventaris', [App\Http\Controllers\InventarisController::class, 'createInventaris'])->name('createInventaris');
        Route::post('/createInventarisStore', [App\Http\Controllers\InventarisController::class, 'add'])->name('addInventaris');

        // * Supervisor -> Keluhan
        Route::get('/keluhan', [App\Http\Controllers\KeluhanController::class, 'daftarKeluhan'])->name('keluhan');
        Route::get('/keluhan/verifikasi', [App\Http\Controllers\KeluhanController::class, 'verifikasi'])->name('keluhanVerify');
        Route::get('/keluhan/detail', [App\Http\Controllers\KeluhanController::class, 'detailKeluhan'])->name('keluhanShow');
        Route::post('/keluhan/penugasan/{complain}', [App\Http\Controllers\KeluhanController::class, 'simpanPenugasan'])->name('keluhanPenugasan');
    });

    Route::group(['middleware' => ['user']], function () {
        // Disini nanti semua route yang hanya bisa diakses oleh user
        // * Workers -> Jadwal
        Route::get('/scheduleWorkers', [App\Http\Controllers\TaskSubmissionController::class, 'scheduleWorkers'])->name('scheduleWorkers');
        // * Workers -> Jadwal -> Tugas
        Route::get('/tasks', [App\Http\Controllers\TaskSubmissionController::class, 'taskSubmission'])->name('tasks');

        // * Workers -> Cuti
        Route::post('/createCuti', [App\Http\Controllers\PaidLeaveController::class, 'createCuti'])->name('createCuti');
        Route::get('/pengajuanCuti', [App\Http\Controllers\PaidLeaveController::class, 'paidLeaveRequest'])->name('pengajuanCuti');

        // * Workers -> Panduan
        Route::get('/workersPanduan', [App\Http\Controllers\PanduanController::class, 'workersPanduan'])->name('workersPanduan');
        Route::get('/workersDetailPanduan/{id}', [App\Http\Controllers\PanduanController::class, 'workersDetailPanduan'])->name('workersDetailPanduan');

        // * Workers -> Keluhan
        Route::get('/pelaporanKeluhan', [App\Http\Controllers\KeluhanController::class, 'daftarPelaporan'])->name('keluhanPelaporan');
        Route::get('/pelaporanKeluhan/buat', [App\Http\Controllers\KeluhanController::class, 'buatPelaporan'])->name('keluhanPelaporanCreate');
        Route::get('/pelaporanKeluhan/detail', [App\Http\Controllers\KeluhanController::class, 'editPelaporan'])->name('keluhanPelaporanEdit');
        Route::post('/pelaporanKeluhan/simpan', [App\Http\Controllers\KeluhanController::class, 'simpanPelaporan'])->name('keluhanPelaporanStore');

        // * Workers -> keluhan -> Penanganan
        Route::get('/penangananKeluhan', [App\Http\Controllers\KeluhanController::class, 'daftarPenanganan'])->name('keluhanPenanganan');
        Route::get('/penangananKeluhan/buat', [App\Http\Controllers\KeluhanController::class, 'buatPenanganan'])->name('keluhanPenangananCreate');
        Route::get('/penangananKeluhan/detail', [App\Http\Controllers\KeluhanController::class, 'detailKeluhanPenanganan'])->name('keluhanPenangananShow');
        Route::get('/penangananKeluhan/edit', [App\Http\Controllers\KeluhanController::class, 'editPenanganan'])->name('keluhanPenangananEdit');
        Route::get('/penangananKeluhan/terima/{asg}', [App\Http\Controllers\KeluhanController::class, 'terimaPenugasan'])->name('terimaPenugasan');
        Route::get('/penangananKeluhan/tolak/{asg}', [App\Http\Controllers\KeluhanController::class, 'tolakPenugasan'])->name('tolakPenugasan');

        // * Workers -> Inventaris
        Route::get('/workersInventaris', [App\Http\Controllers\InventarisController::class, 'workersInventaris'])->name('workersInventaris');
    });
});
