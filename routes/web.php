<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BusquedasController;
use App\Http\Controllers\TiendaController;
use App\Http\Controllers\ComparacionController;

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
    return view('welcome');
});

Route::group(['namespace' => 'App\Http\Controllers'], function() {

    /**
     * Home Routes
     */
    Route::get('/home', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', 'RegisterController@show')->name('register.show');
        Route::post('/register', 'RegisterController@register')->name('register.perform');

        /**
         * Login Routes
         */
        Route::get('/login', 'LoginController@show')->name('login.show'); // REGRESO A "login"
        Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', 'LogoutController@perform')->name('logout.perform');

        /**
         * Fidelizacion Routes
         */
        Route::group(['middleware' => ['auth']], function() {
            Route::resource('fidelizacion', 'FidelizacionController')->except(['show']);
        });
        
    });

    
    Route::get('/comparacion', [ComparacionController::class, 'index'])->name('comparacion.index');


Route::post('/comparar', [ComparacionController::class, 'comparar'])->name('comparar.precios');

});
