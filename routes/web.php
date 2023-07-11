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
    Route::get('/kategoriCuti', [App\Http\Controllers\PaidLeaveController::class, 'kategoriCuti'])->name('kategoriCuti');

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profileEdit');
    Route::put('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profileUpdate');

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
        Route::post('/workersStore', [App\Http\Controllers\TaskSubmissionController::class, 'workersStore'])->name('workersStore');
        Route::get('/workersEdit/{id}', [App\Http\Controllers\TaskSubmissionController::class, 'workersEdit'])->name('workersEdit');
        Route::put('/workersUpdate/{id}', [App\Http\Controllers\TaskSubmissionController::class, 'workersUpdate'])->name('workersUpdate');
        Route::delete('/workersDelete/{id}', [App\Http\Controllers\TaskSubmissionController::class, 'workersDelete'])->name('workersDelete');
        Route::get('/workersSchedule/{id}', [App\Http\Controllers\TaskSubmissionController::class, 'workersSchedule'])->name('workersSchedule');

        // * Supervisor -> Jadwal -> Laporan
        Route::get('/tasksReport', [App\Http\Controllers\TaskSubmissionController::class, 'tasksReport'])->name('tasksReport');
        Route::post('/tasksComment/{id}', [App\Http\Controllers\TaskSubmissionController::class, 'tasksComment'])->name('tasksComment');
        Route::delete('/tasksDelete/{id}', [App\Http\Controllers\TaskSubmissionController::class, 'tasksDecline'])->name('tasksDelete');

        // * Supervisor -> Cuti
        Route::get('/requestList', [App\Http\Controllers\PaidLeaveController::class, 'requestList'])->name('requestList');
        Route::get('/paidLeaveList', [App\Http\Controllers\PaidLeaveController::class, 'paidLeaveList'])->name('paidLeaveList');
        Route::get('/lihat_detail', [App\Http\Controllers\PaidLeaveController::class, 'lihat_detail'])->name('lihat_detail');
        Route::get('/paidLeaveCategory', [App\Http\Controllers\PaidLeaveController::class, 'paidLeaveCategory'])->name('paidLeaveCategory');
        Route::get('/setuju/{id}', [App\Http\Controllers\PaidLeaveController::class, 'setuju'])->name('persetujuan');
        Route::get('/tolak/{id}', [App\Http\Controllers\PaidLeaveController::class, 'tolak'])->name('penolakan');
        Route::get('/deleteCuti/{id}', [App\Http\Controllers\PaidLeaveController::class, 'deleteCuti'])->name('deleteCuti');

        // * Supervisor -> Panduan
        Route::get('/supervisorPanduan', [App\Http\Controllers\PanduanController::class, 'supervisorPanduan'])->name('supervisorPanduan');
        Route::get('/createPanduan', [App\Http\Controllers\PanduanController::class, 'createPanduan'])->name('createPanduan');
        Route::post('/createPanduanStore', [App\Http\Controllers\PanduanController::class, 'add'])->name('addPanduan');
        Route::get('/supervisorDetailPanduan/{id}', [App\Http\Controllers\PanduanController::class, 'supervisorDetailPanduan'])->name('supervisorDetailPanduan');
        Route::get('/editPanduan/{id}', [App\Http\Controllers\PanduanController::class, 'editPanduan'])->name('editPanduan');
        Route::post('/updatePanduan/{id}', [App\Http\Controllers\PanduanController::class, 'updatePanduan'])->name('updatePanduan');
        Route::delete('/deletePanduan/{id}', [App\Http\Controllers\PanduanController::class, 'deletePanduan'])->name('deletePanduan');

        // * Supervisor -> Inventaris
        Route::get('/supervisorInventaris', [App\Http\Controllers\InventarisController::class, 'supervisorInventaris'])->name('supervisorInventaris');
        Route::get('/createInventaris', [App\Http\Controllers\InventarisController::class, 'createInventaris'])->name('createInventaris');
        Route::post('/createInventarisStore', [App\Http\Controllers\InventarisController::class, 'add'])->name('addInventaris');
        Route::get('/editInventaris/{id}', [App\Http\Controllers\InventarisController::class, 'editInventaris'])->name('editInventaris');
        Route::post('/updateInventaris/{id}', [App\Http\Controllers\InventarisController::class, 'updateInventaris'])->name('updateInventaris');
        Route::delete('/deleteInventaris/{id}', [App\Http\Controllers\InventarisController::class, 'deleteInventaris'])->name('deleteInventaris');

        // * Supervisor -> Keluhan
        Route::get('/keluhan', [App\Http\Controllers\KeluhanController::class, 'daftarKeluhan'])->name('keluhan');
        Route::delete('/keluhan/tolak/{complain}', [App\Http\Controllers\KeluhanController::class, 'tolakLaporan'])->name('keluhanDecline');
        Route::get('/keluhan/verifikasi/{asg}', [App\Http\Controllers\KeluhanController::class, 'verifikasi'])->name('keluhanVerify');
        Route::post('/keluhan/verifikasi/simpan/{asg}', [App\Http\Controllers\KeluhanController::class, 'simpanVerifikasi'])->name('keluhanVerifyStore');
        Route::get('/keluhan/detail/{complain}', [App\Http\Controllers\KeluhanController::class, 'detailKeluhan'])->name('keluhanShow');
        Route::post('/keluhan/penugasan/{complain}', [App\Http\Controllers\KeluhanController::class, 'simpanPenugasan'])->name('keluhanPenugasan');
        Route::post('/keluhan/penugasan/update/{asg}', [App\Http\Controllers\KeluhanController::class, 'updatePenugasan'])->name('keluhanPenugasanUpdate');
        Route::delete('/keluhan/penugasan/hapus/{asg}', [App\Http\Controllers\KeluhanController::class, 'hapusPenugasan'])->name('keluhanPenugasanDelete');
        Route::get('/keluhan/ulasan/{asg}', [App\Http\Controllers\KeluhanController::class, 'ulasan'])->name('keluhanShowFeedback');
    });

    Route::group(['middleware' => ['user']], function () {
        // Disini nanti semua route yang hanya bisa diakses oleh user
        // * Workers -> Jadwal
        Route::get('/scheduleWorkers', [App\Http\Controllers\TaskSubmissionController::class, 'scheduleWorkers'])->name('scheduleWorkers');
        // * Workers -> Jadwal -> Tugas
        Route::get('/tasks', [App\Http\Controllers\TaskSubmissionController::class, 'taskSubmission'])->name('tasks');
        Route::post('/tasksUpload/{id}', [App\Http\Controllers\TaskSubmissionController::class, 'tasksUpload'])->name('tasksUpload');

        // * Workers -> Cuti
        Route::post('/createCuti', [App\Http\Controllers\PaidLeaveController::class, 'createCuti'])->name('createCuti');
        Route::get('/pengajuanCuti', [App\Http\Controllers\PaidLeaveController::class, 'paidLeaveRequest'])->name('pengajuanCuti');
        Route::get('/deletePengajuan/{id}', [App\Http\Controllers\PaidLeaveController::class, 'deletePengajuan'])->name('deletePengajuan');

        // * Workers -> Panduan
        Route::get('/workersPanduan', [App\Http\Controllers\PanduanController::class, 'workersPanduan'])->name('workersPanduan');
        Route::get('/workersDetailPanduan/{id}', [App\Http\Controllers\PanduanController::class, 'workersDetailPanduan'])->name('workersDetailPanduan');

        // * Workers -> Keluhan
        Route::get('/pelaporanKeluhan', [App\Http\Controllers\KeluhanController::class, 'daftarPelaporan'])->name('keluhanPelaporan');
        Route::get('/pelaporanKeluhan/buat', [App\Http\Controllers\KeluhanController::class, 'buatPelaporan'])->name('keluhanPelaporanCreate');
        Route::get('/pelaporanKeluhan/detail/{complain}', [App\Http\Controllers\KeluhanController::class, 'editPelaporan'])->name('keluhanPelaporanEdit');
        Route::post('/pelaporanKeluhan/simpan', [App\Http\Controllers\KeluhanController::class, 'simpanPelaporan'])->name('keluhanPelaporanStore');
        Route::post('/pelaporanKeluhan/update/{complain}', [App\Http\Controllers\KeluhanController::class, 'updatePelaporan'])->name('keluhanPelaporanUpdate');
        Route::delete('/pelaporanKeluhan/hapus/{complain}', [App\Http\Controllers\KeluhanController::class, 'hapusPelaporan'])->name('keluhanPelaporanDelete');

        // * Workers -> keluhan -> Penanganan
        Route::get('/penangananKeluhan', [App\Http\Controllers\KeluhanController::class, 'daftarPenanganan'])->name('keluhanPenanganan');
        Route::get('/penangananKeluhan/buat/{asg}', [App\Http\Controllers\KeluhanController::class, 'buatPenanganan'])->name('keluhanPenangananCreate');
        Route::post('/penangananKeluhan/simpan/{asg}', [App\Http\Controllers\KeluhanController::class, 'simpanPenanganan'])->name('keluhanPenangananStore');
        Route::get('/penangananKeluhan/detail/{asg}', [App\Http\Controllers\KeluhanController::class, 'detailKeluhanPenanganan'])->name('keluhanPenangananShow');
        Route::get('/penangananKeluhan/edit/{asg}', [App\Http\Controllers\KeluhanController::class, 'editPenanganan'])->name('keluhanPenangananEdit');
        Route::post('/penangananKeluhan/update/{asg}', [App\Http\Controllers\KeluhanController::class, 'updatePenanganan'])->name('keluhanPenangananUpdate');
        Route::get('/penangananKeluhan/terima/{asg}', [App\Http\Controllers\KeluhanController::class, 'terimaPenugasan'])->name('terimaPenugasan');
        Route::delete('/penangananKeluhan/tolak/{asg}', [App\Http\Controllers\KeluhanController::class, 'tolakPenugasan'])->name('tolakPenugasan');
        Route::delete('/penangananKeluhan/hapus/{asg}', [App\Http\Controllers\KeluhanController::class, 'hapusPenanganan'])->name('keluhanPenangananDelete');
        Route::get('/penangananKeluhan/ulasan/{asg}', [App\Http\Controllers\KeluhanController::class, 'ulasanPenanganan'])->name('keluhanPenangananFeedback');

        // * Workers -> Inventaris
        Route::get('/workersInventaris', [App\Http\Controllers\InventarisController::class, 'workersInventaris'])->name('workersInventaris');
    });
});
