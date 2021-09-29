<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductocanastaController;

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


/*
Route::get('/ProductoCanasta', function () {
    return view('ProductoCanasta.index');

});
*/

Route::resource('ProductoCanasta', ProductocanastaController::class);
Auth::routes(['reset'=>false]);

Route::get('/home', [ProductocanastaController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'],function(){
    Route::get('/', [ProductocanastaController::class, 'index'])->name('basicRoute');
});
Route::get('/Admin', [ProductocanastaController::class, 'Menu'])->name('adminHome');

Route::get('/Tienda', [ProductocanastaController::class, 'Tienda'])->name('tienda');

Route::get('/Inversionistas', [ProductocanastaController::class, 'Inversionistas'])->name('inversionista');

Route::get('/Emprendimientos', [ProductocanastaController::class, 'Emprendimientos'])->name('emprendimiento');
