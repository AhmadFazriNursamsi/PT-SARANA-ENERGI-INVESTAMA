<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ApisController;
use App\Http\Controllers\ListaccessController;
use App\Http\Controllers\R404Controller;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\CustomerControler;
use App\Http\Controllers\QrcodeController;
use App\Http\Controllers\TopController;

Route::get('/', function () {
    return view('welcome');
});



Route::group(['middleware'=>'auth'], function(){
   Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//    Route::get('/top', function () {
//     return view('Top.index');
// });
});

Route::get('/top', [TopController::class, 'index']);
Route::get('/top/getdata', [TopController::class, 'getdata']);
Route::get('/top/getdata/edit/{id}', [TopController::class, 'edit']);
Route::get('/top/getdata/delete/{id}', [TopController::class, 'destroy']);
Route::post('/top/store', [TopController::class, 'store']);
Route::post('/top/update/{id}', [TopController::class, 'update']);

// Route::get('/top/getdata', [TopController::class, 'getdata']);


Route::get('/404', [R404Controller::class, 'r404']);
Route::get('/405', [R404Controller::class, 'r405']);
Route::get('/500', [R404Controller::class, 'r500']);

require __DIR__.'/auth.php';
