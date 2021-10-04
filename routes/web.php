<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductocanastaController;
use App\Http\Controllers\EventosController;
use App\Http\Controllers\InversionistaController;
use App\Http\Controllers\OrganizacionesController;
use App\Http\Controllers\OfertasController;
use App\Http\Controllers\CarritoController;


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


Route::get('/crud', function () {
    return view('ProductoCanasta.index');

});

Route::resource('ProductoCanasta', ProductocanastaController::class);

Route::resource('AdminHome2', ProductocanastaController::class);

Auth::routes(['reset'=>false]);

Route::resource('Eventos', EventosController::class);

Route::resource('Ofertas', OfertasController::class);

Route::resource('Inversionista', InversionistaController::class);

Route::resource('Organizaciones', OrganizacionesController::class);

Route::resource('Carrito', CarritoController::class);

Route::get('storage-link', function(){Artisan::call('storage:link');});

Route::get('/home', [ProductocanastaController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'],function(){
    Route::get('/', [ProductocanastaController::class, 'index'])->name('basicRoute');
});
Route::get('/Admin', [ProductocanastaController::class, 'Menu'])->name('adminHome');

Route::get('/Tienda', [ProductocanastaController::class, 'Tienda'])->name('tienda');

Route::get('/OfertasTienda', [ProductocanastaController::class, 'OfertasDescuento'])->name('ofertasTienda');

Route::get('/InversionistaTienda', [ProductocanastaController::class, 'Inversionistas'])->name('inversionistaTienda');

Route::get('/Emprendimientos', [ProductocanastaController::class, 'Emprendimientos'])->name('emprendimiento');

Route::get('/Organizaciones', [OrganizacionesController::class, 'index'])->name('organizacionesCrud');

Route::get('/Ofertas', [OfertasController::class, 'index'])->name('ofertasCrud');

Route::get('/Inversionista', [InversionistaController::class, 'index'])->name('inversionistasCrud');

Route::get('/Eventos', [EventosController::class, 'index'])->name('eventosCrud');

Route::get('/Carrito', [CarritoController::class, 'index'])->name('CarritoCrud');

Route::get('/carrito/create/{id}/{nombre_usuario}',[CarritoController::class,'existe']);