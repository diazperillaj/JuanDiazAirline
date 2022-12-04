<?php

use App\Http\Controllers\JdaerolineaController;
use App\Http\Controllers\JdvueloController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
Route::get('/', function(){
    return redirect()->route('ingreso.show');
});

Route::controller(RegisterController::class)->group(function(){
    Route::get('registro', 'show')->name('registro.show');
    Route::post('registro', 'store')->name('registro.store');
});

Route::controller(LoginController::class)->group(function(){
    Route::get('ingreso','show')->name('ingreso.show');
    Route::post('ingreso', 'store')->name('ingreso.store');
});

Route::controller(JdaerolineaController::class)->group(function(){
    Route::get('aerolineas', 'index')->name('aerolineas.index');
    Route::post('aerolineas', 'store')->name('aerolineas.store');
    Route::patch('aerolineas/editar/{id}', 'edit')->name('aerolineas.edit');
    Route::get('aerolineas/editar/{id}', 'update')->name('aerolineas.update');
    Route::get('aerolineas/eliminar/{id}', 'delete')->name('aerolineas.delete');
    Route::delete('aerolineas/eliminar/{id}', 'destroy')->name('aerolineas.destroy');
});

Route::controller(JdvueloController::class)->group(function(){
    Route::get('vuelos/{id}', 'show')->name('vuelos.show');
    Route::get('vuelos', 'index')->name('vuelos.index');
    Route::post('vuelos/crear/{id}', 'store')->name('vuelos.store');
    Route::get('vuelo/editar/{id}', 'update')->name('vuelos.update');
    Route::patch('vuelo/editar/{id}', 'edit')->name('vuelos.edit');
    Route::get('vuelo/eliminar/{id}', 'delete')->name('vuelos.delete');
    Route::delete('vuelo/eliminar/{id}', 'destroy')->name('vuelos.destroy');
});

Route::get('logout', [LogoutController::class, 'logout'])->name('log.logout');