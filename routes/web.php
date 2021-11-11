<?php

use App\Http\Controllers\HomeController;
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
});
