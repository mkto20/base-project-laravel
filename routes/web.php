<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Security\ModuloController;
use App\Http\Controllers\Security\PerfilController;
use App\Http\Controllers\Security\UserController;
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

Route::get('/', function () {
    return redirect()->route('login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::resource('admin/users', UserController::class);

    // rotas de perfil ----------------------------------------------------------------------------------------
    Route::get('/admin/perfis', [PerfilController::class, 'index'])->name('perfis.index');                  // |
    Route::get('/admin/perfis/create', [PerfilController::class, 'create'])->name('perfis.create');         // |
    Route::post('/admin/perfis/create', [PerfilController::class, 'store'])->name('perfis.store');          // |
    Route::get('/admin/perfis/{perfil}/edit', [PerfilController::class, 'edit'])->name('perfis.edit');      // |
    Route::put('/admin/perfis/{perfil}/edit', [PerfilController::class, 'update'])->name('perfis.update');  // |
    // ---------------------------------------------------------------------------------------------------------

    // rotas de módulos ----------------------------------------------------------------------------------------
    Route::get('/admin/modules', [ModuloController::class, 'index'])->name('modules.index');                  // |
    Route::get('/admin/modules/create', [ModuloController::class, 'create'])->name('modules.create');         // |
    Route::post('/admin/modules/create', [ModuloController::class, 'store'])->name('modules.store');          // |
    Route::get('/admin/modules/{modulo}/edit', [ModuloController::class, 'edit'])->name('modules.edit');      // |
    Route::put('/admin/modules/{modulo}/edit', [ModuloController::class, 'update'])->name('modules.update');  // |
    // ---------------------------------------------------------------------------------------------------------
});
