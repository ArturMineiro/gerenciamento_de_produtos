<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\CategoriaController;
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
    return view('/home');
})->middleware('auth');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::middleware(['auth'])->group(function () {
    Route::get('/produtos', [ProdutoController::class, 'index'])->name('produto.index');
    Route::get('/produtos/create', [ProdutoController::class, 'create'])->name('produto.create');
    Route::post('/produtos', [ProdutoController::class, 'store'])->name('produto.store');
    Route::get('/produtos/{id}/edit', [ProdutoController::class, 'edit'])->name('produto.edit');
    Route::put('/produtos/{id}', [ProdutoController::class, 'update'])->name('produto.update');
    Route::delete('/produtos/{id}', [ProdutoController::class, 'delete'])->name('produto.delete');
Route::get('/produtos/pesquisar', [ProdutoController::class, 'pesquisar'])->name('produto.pesquisar');


    Route::get('/categorias', [CategoriaController::class, 'index'])->name('categoria.index');
    Route::get('/categorias/create', [CategoriaController::class, 'create'])->name('categoria.create');
    Route::post('/categorias', [CategoriaController::class, 'store'])->name('categoria.store');
    Route::get('/categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('categoria.edit');
    Route::put('/caregorias/{id}', [CategoriaController::class, 'update'])->name('categoria.update');
    Route::delete('/categorias/{id}', [CategoriaController::class, 'delete'])->name('categoria.delete');
});


