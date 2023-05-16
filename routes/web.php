<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/lf', function () {
    return view('auth.loginFix');
});

Route::get('/schedule', [App\Http\Controllers\TaskSubmissionController::class, 'schedule'])->name('schedule');
Route::get('/tasksReport', [App\Http\Controllers\TaskSubmissionController::class, 'tasksReport'])->name('tasksReport');

Route::get('/workers', [App\Http\Controllers\TaskSubmissionController::class, 'workers'])->name('workers');
Route::get('/workersCreate', [App\Http\Controllers\TaskSubmissionController::class, 'workersCreate'])->name('workersCreate');
// Route::get('/workersEdit/{id}', [App\Http\Controllers\TaskSubmissionController::class, 'workersEdit'])->name('workersEdit');
Route::get('/workersEdit', [App\Http\Controllers\TaskSubmissionController::class, 'workersEdit'])->name('workersEdit');
Route::post('/workersUpdate/{id}', [App\Http\Controllers\TaskSubmissionController::class, 'workersUpdate'])->name('workersUpdate');
Route::get('/workersDelete/{id}', [App\Http\Controllers\TaskSubmissionController::class, 'workersDelete'])->name('workersDelete');
Route::get('/workersSchedule', [App\Http\Controllers\TaskSubmissionController::class, 'workersSchedule'])->name('workersSchedule');
Route::get('/tasks', [App\Http\Controllers\TaskSubmissionController::class, 'taskSubmission'])->name('tasks');
Route::get('/scheduleWorkers', [App\Http\Controllers\TaskSubmissionController::class, 'scheduleWorkers'])->name('scheduleWorkers');
Route::get('/requestList', [App\Http\Controllers\PaidLeaveController::class, 'requestList'])->name('requestList');
Route::get('/paidLeaveList', [App\Http\Controllers\PaidLeaveController::class, 'paidLeaveList'])->name('paidLeaveList');
Route::get('/paidLeaveCategory', [App\Http\Controllers\PaidLeaveController::class, 'paidLeaveCategory'])->name('paidLeaveCategory');
Route::get('/kategoriCuti', [App\Http\Controllers\PaidLeaveController::class, 'kategoriCuti'])->name('kategoriCuti');
Route::get('/pengajuanCuti', [App\Http\Controllers\PaidLeaveController::class, 'paidLeaveRequest'])->name('pengajuanCuti');


Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['middleware' => ['supervisor']],function(){
        // Disini nanti semua route yang hanya bisa diakses oleh supervisor
    });

    Route::group(['middleware' => ['user']],function(){
        // Disini nanti semua route yang hanya bisa diakses oleh user

    });    
});

