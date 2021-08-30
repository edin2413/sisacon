<?php

use App\Http\Controllers\InicioController;
use App\Models\ControlAsiento;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

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


Route::get('/', function() {
    return view('auth.login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('inicio', 'App\Http\Controllers\DashboardController');

Route::resource('categorias', 'App\Http\Controllers\CategoriaController');

Route::resource('empresas', 'App\Http\Controllers\EmpresaController');

Route::resource('asientos', 'App\Http\Controllers\AsientoController');

Route::resource('controlasientos', 'App\Http\Controllers\ControlAsientoController');


//
#Route::get('controlasientos/buscar',[EmpresaController::class, 'buscar'])->name('buscar_data');
