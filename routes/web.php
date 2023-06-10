<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GrifoController;
use App\Http\Controllers\HomeController;
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

  Route::get('mapa', [ HomeController::class,'mapa'])->name('mapa');

  Route::get('grifos', [GrifoController::class,'index'])->name('grifos.index');
  Route::get('grifos/{id}', [GrifoController::class,'show'])->name('grifos.show');
  Route::get('grifos/{id}/edit',[GrifoController::class,'edit'])->name('grifos.edit');
  Route::put('grifos/{id}/edit',[GrifoController::class,'update'])->name('grifos.update');

  Route::resource('usuarios', UsuarioController::class);
});
