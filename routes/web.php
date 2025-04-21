<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade as PDF;
use App\Http\Controllers\{
    RegisterController, LoginController, HomeController, LogoutController,
    BusquedasController, TiendaController, ComparacionController,
    FidelizacionController, UserController, ProductosController, DashboardController,
    SearchController
};
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

/**
 * Rutas de Inicio
 */
Route::get('/home', [HomeController::class, 'index'])->name('home.busquedas');

/**
 * Navegabilidad pública
 */
Route::get('/tiendas', [TiendaController::class, 'publicIndex'])->name('tiendas');
Route::get('/productos', [ProductosController::class, 'publicIndex'])->name('productos.index');

/**
 * Rutas accesibles solo para invitados
 */
Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'show'])->name('register.show');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.perform');

    Route::get('/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login.perform');
});

/**
 * Rutas protegidas para usuarios autenticados
 */
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
});

/**
 * Búsquedas disponibles para todos los usuarios
 */
Route::resource('busquedas', BusquedasController::class);

/**
 * Comparación de precios
 */
Route::get('/comparacion', [ComparacionController::class, 'index'])->name('comparacion');
Route::post('/comparar', [ComparacionController::class, 'comparar'])->name('comparar');

/**
 * Dashboard del Administrador
 */
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

/**
 * Grupo de rutas protegidas para Administrador
 */
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('tiendas', TiendaController::class)->except(['show']);
    Route::resource('productos', ProductosController::class)->except(['show']);
});

/* Ruta search */
Route::get('/buscar', [SearchController::class, 'index'])->name('search.buscar');

Route::middleware(['auth'])
     ->prefix('admin')
     ->name('admin.')
     ->group(function () {
    Route::resource('productos', ProductosController::class)
         ->except(['show']);
    Route::get('productos/pdf', [ProductosController::class, 'generarPDF'])
         ->name('productos.pdf');
});

Route::middleware(['auth'])
     ->prefix('admin')
     ->name('admin.')
     ->group(function () {
    Route::resource('tiendas', TiendaController::class)
         ->except(['show']);
    Route::get('tiendas/pdf', [TiendaController::class, 'generarPDF'])
         ->name('tiendas.pdf');
});
