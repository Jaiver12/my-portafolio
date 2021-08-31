<?php

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

Route::get('/', [App\Http\Controllers\ProyectoController::class, 'index'])->name('welcome');
Route::post('/crear-mensaje', [App\Http\Controllers\ProyectoController::class, 'store'])->name('crear-mensaje');
Route::get('/ver-mensajes', [App\Http\Controllers\ProyectoController::class, 'mensaje'])->name('ver-mensajes');

Route::get('/portafolio', [App\Http\Controllers\PortafolioController::class, 'index'])->name('portafolio');
Route::get('/create-proyecto', [App\Http\Controllers\PortafolioController::class, 'create'])->name('create-proyecto');
Route::post('/create-store', [App\Http\Controllers\PortafolioController::class, 'store'])->name('create-store');
Route::get('/proyecto-show/{id}', [App\Http\Controllers\PortafolioController::class, 'show'])->name('proyecto-show');
Route::get('/proyecto-edit/{id}', [App\Http\Controllers\PortafolioController::class, 'edit'])->name('proyecto-edit');
Route::PATCH('/proyecto-update/{id}', [App\Http\Controllers\PortafolioController::class, 'update'])->name('proyecto-update');
Route::delete('/proyecto-delete/{id}', [App\Http\Controllers\PortafolioController::class, 'destroy'])->name('proyecto-delete');



Auth::routes();


//Route::resource('/portafolio', App\Http\Controllers\PortafolioController::class );

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
