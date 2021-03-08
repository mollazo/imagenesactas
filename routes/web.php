<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::get('/registrar',function(){
    return view('auth.register');
})->name('registrar');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/user/store', [App\Http\Controllers\ImagenController::class, 'store'])->name('crearusuario');
Route::get('/homevisor', [App\Http\Controllers\ImagenController::class, 'index'])->name('homevisor');
Route::post('/acta/{id}/imagenes', [App\Http\Controllers\ImagenController::class, 'upload'])->name('upload');

