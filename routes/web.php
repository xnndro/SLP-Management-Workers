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
    return view('workers.pages.schedule');
});

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

