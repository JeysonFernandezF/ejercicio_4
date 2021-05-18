<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Productos;
use App\Http\Controllers\Categorias;
use App\Http\Controllers\Usuario;
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

Route::get('/',[Usuario::class, 'index'])->name('index');
Route::get('/registrarse',[Usuario::class, 'registrarse'])->name('registrarse');

Route::post('/registrar',[Usuario::class, 'registrar'])->name('registrar');
Route::post('/login',[Usuario::class, 'login'])->name('login');
Route::get('/logout', [Usuario::class, 'logout'])->name('logout');

Route::middleware(['login'])->group(function () {
    Route::get('/productos', [Productos::class, 'index'])->name('productos-index');
    Route::get('/producto/{id}/ver', [Productos::class, 'ver'])->name('ver-producto');
    Route::get('/producto/{id}/editar', [Productos::class, 'editar'])->name('editar-producto');
    Route::get('/producto/{id}/borrar', [Productos::class, 'borrar'])->name('borrar-producto');
    

    Route::get('/crear-producto', [Productos::class, 'crear'])->name('crear-producto');
    Route::post('/guardar-producto', [Productos::class, 'store'])->name('guardar-producto');
    
    Route::get('/busqueda', [Productos::class, 'filtrar'])->name('filtrar-productos');

});


