<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\inicio;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TemaController;
use App\Http\Livewire\Usuarios;
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

Route::get('/', [InicioController::class,'inicio'])->name('welcome');
Auth::routes();
//estas rutas perteneces a todos los usuarios
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/acercade', [HomeController::class, 'acercade'])->name('about');
//estas son las rutas para modificar temas
Route::prefix('/temas')->middleware('auth')->group(function(){
    Route::get('/',[TemaController::class,'index'])->name('temas');
    Route::post('/',[TemaController::class,'create'])->name('temas');
    Route::get('/delete/{id}',[TemaController::class,'delete'])->name('deleteTema');
    Route::get('/editar/{id}',[TemaController::class,'editar'])->name('editarTema');
});

Route::prefix('/posts')->middleware('auth')->group(function(){
    Route::get('/',[PostController::class,'index'])->name('posts');
    Route::post('/',[PostController::class,'create'])->name('posts');
    Route::get('/delete/{id}',[PostController::class,'delete'])->name('deletePost');
    Route::get('/editar/{id}',[PostController::class,'editar'])->name('editarPost');
});

Route::get('/usuarios',Usuarios::class)->middleware(['auth','rol:Administrador'])->name('usuarios');
