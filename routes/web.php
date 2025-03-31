<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\BusquedasController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\FidelizacionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar las rutas web para tu aplicación.
| Estas rutas son cargadas por el RouteServiceProvider y están dentro
| del grupo que contiene el middleware "web".
|
*/

Route::get('/', function () {
    return view('welcome');
});

/**
 * Home Routes
 */
Route::get('/home', [HomeController::class, 'index'])->name('home.busquedas');

/**
 * navegabilidad tiendas
 */

 Route::get('/tiendas', function () { return view('home.tiendas'); })->name('tiendas');


/**
 * Rutas accesibles solo para invitados (usuarios no autenticados)
 */
Route::middleware(['guest'])->group(function () {
    /**
     * Register Routes
     */
    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

    /**
     * Login Routes
     */
    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
});

/**
 * Rutas protegidas para usuarios autenticados
 */
Route::middleware(['auth'])->group(function () {
    /**
     * Logout Routes
     */
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');

    /**
     * Fidelización Routes
     */
    Route::resource('fidelizacion', FidelizacionController::class)->except(['show']);
});

/**
 * Rutas accesibles para todos los usuarios
 */
Route::resource('busquedas', BusquedasController::class);
