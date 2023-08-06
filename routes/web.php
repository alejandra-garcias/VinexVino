<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/bar',[BarController::class, 'index'])->name('bars.index');

Route::get('/bar/create',[BarController::class,'create'])->name('bars.create');
Route::post('/bar/create',[BarController::class, 'store'])->name('bars.store');
Route::get('/bar/edit/{id}',[BarController::class,'edit'])->name('bars.edit');
Route::post('/bar/update/{id}',[BarController::class, 'update'])->name('bars.update');
Route::post('/bar/delete/{id}',[BarController::class, 'delete'])->name('bars.delete');

Route::get('/bar/{id}',[BarController::class,'show'])->name('bars.show');


Route::get('/contacto',[ContactController::class, 'create'])->name('contact');
Route::post('/contacto',[ContactController::class, 'store']); //no tengo que poner name de nuevo por que es la misma ruta