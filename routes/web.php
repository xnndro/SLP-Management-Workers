<?php

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

// Route::get('/', function () {
//     return view('auth.login');
// });
Route::get('/', function () {
    return view('auth.login');
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

