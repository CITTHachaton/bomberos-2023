<?php

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

Route::get('/', [ HomeController::class,'index'])->name('home');
Route::get('mapa', [ HomeController::class,'mapa'])->name('mapa');

Route::get('grifos', [GrifoController::class,'index'])->name('grifos.index');
Route::get('grifos/{id}', [GrifoController::class,'show'])->name('grifos.show');

Route::resource('usuarios', UsuarioController::class);
