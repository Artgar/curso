<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TemaController;
use App\Models\Tema;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/acercade', [HomeController::class, 'acercade'])->name('about');

Route::get('/temas',[TemaController::class,'index'])->name('temas');
Route::post('/temas',[TemaController::class,'create'])->name('temas');
