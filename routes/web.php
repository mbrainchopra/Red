<?php

use App\Http\Controllers\TaskControl;
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

Route::get('/', function () {
    return view('welcome');
});
Route::post('taskadd',[TaskControl::class,'addtask']);
Auth::routes();
/* 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
Route::get('home',[TaskControl::class,'getTask']);
Route::view('addtask','addtask');
Route::get('tasknow',[TaskControl::class,'gettask']);
Route::view('test','test');