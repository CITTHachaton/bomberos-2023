<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GrifoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/', [ HomeController::class,'index'])->name('root');
Route::get('login', [ HomeController::class,'login'])->name('login');
Route::post('login', [ AuthController::class,'login'])->name('login');

Route::middleware('auth.usuario')->group( function () {
  Route::get('/home', [ HomeController::class,'home'])->name('home');

  Route::get('mapa_general', [ HomeController::class,'mapa_general'])->name('mapa_general');
  Route::get('mapa', [ HomeController::class,'mapa'])->name('mapa');
  Route::get('mapa2', [ HomeController::class,'mapa2'])->name('mapa2');
  Route::get('mapa/disponibles', [ HomeController::class,'mapa3'])->name('mapa3');
  Route::get('mapa/enproblema', [ HomeController::class,'mapa3'])->name('mapa3');
  Route::get('mapa3', [ HomeController::class,'mapa3'])->name('mapa3');

  Route::get('grifos', [GrifoController::class,'index'])->name('grifos.index');
  Route::post('grifos', [GrifoController::class,'store'])->name('grifos.store');
  Route::get('grifos/{id}', [GrifoController::class,'show'])->name('grifos.show');
  Route::get('grifos/{id}/edit',[GrifoController::class,'edit'])->name('grifos.edit');
  Route::put('grifos/{id}/edit',[GrifoController::class,'update'])->name('grifos.update');
  Route::put('grifos/edit',[GrifoController::class,'updateDatos'])->name('grifos.update_a');

  Route::get('reportes',[ReporteController::class,'index'])->name('reporte.index');


  Route::resource('usuarios', UsuarioController::class);
});
