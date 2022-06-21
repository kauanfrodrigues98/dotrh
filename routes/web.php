<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BeneficiosController;
use App\Http\Controllers\EquipamentosController;
use App\Http\Controllers\PontosController;
use App\Http\Controllers\PontosManuaisController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\ArquivosController;
use App\Http\Controllers\CargosController;
use App\Http\Controllers\ContratoTrabalhosController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth', 'can:is_admin'])->group(function() {
    Route::prefix('usuarios')->group(function() {
        Route::get('listar', [UsersController::class, 'index'])->name('users.index');
        Route::get('cadastrar', [UsersController::class, 'cadastrar'])->name('users.cadastrar');
        Route::get('detalhes/{id}', [UsersController::class, 'detalhes'])->name('users.detalhes');
        Route::post('salvar', [UsersController::class, 'store'])->name('users.store');
        Route::post('atualizar', [UsersController::class, 'update'])->name('users.update');
    });

    Route::prefix('beneficios')->group(function() {
        Route::get('listar', [BeneficiosController::class, 'index'])->name('beneficios.index');
        Route::get('cadastrar', [BeneficiosController::class, 'create'])->name('beneficios.cadastrar');
        Route::post('salvar', [BeneficiosController::class, 'store'])->name('beneficios.store');
        Route::get('detalhes/{id}', [BeneficiosController::class, 'show'])->name('beneficios.detalhes');
        Route::post('atualizar', [BeneficiosController::class, 'update'])->name('beneficios.update');
    });

    Route::prefix('equipamento_trabalho')->group(function() {
        Route::get('listar', [EquipamentosController::class, 'index'])->name('equipamentos.index');
        Route::get('cadastrar', [EquipamentosController::class, 'create'])->name('equipamentos.cadastrar');
        Route::post('salvar', [EquipamentosController::class, 'store'])->name('equipamentos.store');
        Route::get('detalhes/{id}', [EquipamentosController::class, 'show'])->name('equipamentos.detalhes');
        Route::post('atualizar', [EquipamentosController::class, 'update'])->name('equipamentos.update');
    });

    Route::prefix('departamentos')->group(function() {
        Route::get('listar', [DepartamentosController::class, 'index'])->name('departamentos.index');
        Route::get('cadastrar', [DepartamentosController::class, 'create'])->name('departamentos.cadastrar');
        Route::post('salvar', [DepartamentosController::class, 'store'])->name('departamentos.store');
        Route::get('detalhes/{id}', [DepartamentosController::class, 'show'])->name('departamentos.detalhes');
        Route::post('atualizar', [DepartamentosController::class, 'update'])->name('departamentos.update');
    });

    Route::prefix('cargos')->group(function() {
        Route::get('listar', [CargosController::class, 'index'])->name('cargos.index');
        Route::get('cadastrar', [CargosController::class, 'create'])->name('cargos.cadastrar');
        Route::post('salvar', [CargosController::class, 'store'])->name('cargos.store');
        Route::get('detalhes/{id}', [CargosController::class, 'show'])->name('cargos.detalhes');
        Route::post('atualizar', [CargosController::class, 'update'])->name('cargos.update');
    });

    Route::prefix('contrato_trabalho')->group(function() {
        Route::get('listar', [ContratoTrabalhosController::class, 'index'])->name('contrato_trabalho.index');
        Route::get('cadastrar', [ContratoTrabalhosController::class, 'create'])->name('contrato_trabalho.cadastrar');
        Route::post('salvar', [ContratoTrabalhosController::class, 'store'])->name('contrato_trabalho.store');
        Route::get('detalhes/{id}', [ContratoTrabalhosController::class, 'show'])->name('contrato_trabalho.detalhes');
        Route::post('atualizar', [ContratoTrabalhosController::class, 'update'])->name('contrato_trabalho.update');
    });

    Route::prefix('ajax')->middleware('auth')->group( function() {
        Route::get('lider_responsavel', [UsersController::class, 'getLiderResponsavel'])->name('ajax.liderResponsavel');
        Route::get('departamentos', [DepartamentosController::class, 'getDepartamentos'])->name('ajax.departamentos');
        Route::get('cargos', [CargosController::class, 'getCargos'])->name('ajax.cargos');
    } );
});

Route::prefix('ponto')->middleware('auth')->group(function() {
    Route::get('listar', [PontosController::class, 'index'])->name('ponto.index');
    Route::get('cadastrar', [PontosController::class, 'create'])->name('ponto.cadastrar');
    Route::post('salvar', [PontosController::class, 'store'])->name('ponto.store');
    Route::get('detalhes/{id}', [PontosController::class, 'edit'])->name('ponto.detalhes');
    Route::post('atualizar', [PontosController::class, 'update'])->name('ponto.update');
});

Route::prefix('ponto/manual')->middleware('auth')->group(function() {
    Route::get('listar', [PontosManuaisController::class, 'index'])->name('ponto.manual.index');
    Route::get('cadastrar', [PontosManuaisController::class, 'create'])->name('ponto.manual.cadastrar');
    Route::post('salvar', [PontosManuaisController::class, 'store'])->name('ponto.manual.store');
    Route::get('detalhes/{id}', [PontosManuaisController::class, 'edit'])->name('ponto.manual.detalhes');
    Route::post('atualizar', [PontosManuaisController::class, 'update'])->name('ponto.manual.update');
});

Route::get('alteracao_senha', [UsersController::class, 'alterarSenha'])->name('alterar_senha');
Route::post('update_senha', [UsersController::class, 'updateSenha'])->name('senha.update');

Route::get('download/arquivos/{id}', [ArquivosController::class, 'download'])->name('arquivos.download');
