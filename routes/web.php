<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Security\ModuloController;
use App\Http\Controllers\Security\OperacaoController;
use App\Http\Controllers\Security\PerfilController;
use App\Http\Controllers\Security\SubmoduloController;
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
    Route::put('/admin/users/{user}/attach', [UserController::class, 'attach'])->name('users.attach');
    Route::delete('/admin/users/{user}/detach', [UserController::class, 'detach'])->name('users.detach');

    // rotas de perfil ----------------------------------------------------------------------------------------
    Route::get('/admin/perfis', [PerfilController::class, 'index'])->name('perfis.index');                   // |
    Route::get('/admin/perfis/create', [PerfilController::class, 'create'])->name('perfis.create');          // |
    Route::post('/admin/perfis/create', [PerfilController::class, 'store'])->name('perfis.store');           // |
    Route::get('/admin/perfis/{perfil}', [PerfilController::class, 'show'])->name('perfis.show');            // |
    Route::put('/admin/perfis/{perfil}/attach', [PerfilController::class, 'attach'])->name('perfis.attach'); // |
    Route::get('/admin/perfis/{perfil}/edit', [PerfilController::class, 'edit'])->name('perfis.edit');       // |
    Route::put('/admin/perfis/{perfil}/edit', [PerfilController::class, 'update'])->name('perfis.update');   // |
    // ---------------------------------------------------------------------------------------------------------

    // rotas de módulos -----------------------------------------------------------------------------------------
    Route::get('/admin/modules', [ModuloController::class, 'index'])->name('modules.index');                  // |
    Route::get('/admin/modules/create', [ModuloController::class, 'create'])->name('modules.create');         // |
    Route::post('/admin/modules/create', [ModuloController::class, 'store'])->name('modules.store');          // |
    Route::get('/admin/modules/{modulo}/edit', [ModuloController::class, 'edit'])->name('modules.edit');      // |
    Route::put('/admin/modules/{modulo}/edit', [ModuloController::class, 'update'])->name('modules.update');  // |
    // ----------------------------------------------------------------------------------------------------------

    // rotas de submódulos ---------------------------------------------------------------------------------------------------
    Route::get('/admin/submodules', [SubmoduloController::class, 'index'])->name('submodules.index');                     // |
    Route::get('/admin/submodules/create', [SubmoduloController::class, 'create'])->name('submodules.create');            // |
    Route::post('/admin/submodules/create', [SubmoduloController::class, 'store'])->name('submodules.store');             // |
    Route::get('/admin/submodules/{submodulo}', [SubmoduloController::class, 'show'])->name('submodules.show');           // |
    Route::get('/admin/submodules/{submodulo}/edit', [SubmoduloController::class, 'edit'])->name('submodules.edit');      // |
    Route::put('/admin/submodules/{submodulo}/edit', [SubmoduloController::class, 'update'])->name('submodules.update');  // |
    // -----------------------------------------------------------------------------------------------------------------------

    // rotas de Operacoes -------------------------------------------------------------------------------------------------
    Route::post('/admin/operations/create', [OperacaoController::class, 'store'])->name('operations.store');           // |
    Route::put('/admin/operations/{operacao}/edit', [OperacaoController::class, 'update'])->name('operations.update'); // |
    // --------------------------------------------------------------------------------------------------------------------
});
