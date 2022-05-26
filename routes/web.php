<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    return redirect('/login');
});



Route::get('/usuarios', function () {
    foreach (User::all() as $user) {
        echo $user->name." teste <br/>";
    }
    return 'teste';
});

Route::prefix('republica')->group(function () {

    Route::get('/cadastrar',[App\Http\Controllers\RepublicaControlador::class, 'formularioCadastro'])
    ->name('formulario_cadastrar_republica');

    Route::post('/cadastrar',[App\Http\Controllers\RepublicaControlador::class, 'cadastrar'])
    ->name('cadastrar_republica');

    Route::get('/editar/{id}',[App\Http\Controllers\RepublicaControlador::class, 'editar'])
    ->name('formulario_editar_republica')
    ->where('id', '[0-9]+');

    Route::post('/alterar',[App\Http\Controllers\RepublicaControlador::class, 'alterar'])
    ->name('alterar_republica');

    Route::get('/excluir/{id}',[App\Http\Controllers\RepublicaControlador::class, 'excluir'])
    ->name('excluir_republica');
});


Route::prefix('membros')->group(function () {

    Route::get('/',[App\Http\Controllers\MembroControlador::class, 'listar'])
    ->name('listar_membros');

    Route::get('/cadastrar',[App\Http\Controllers\MembroControlador::class, 'formularioCadastro'])
    ->name('formulario_cadastrar_membro');

    Route::post('/cadastrar',[App\Http\Controllers\MembroControlador::class, 'cadastrar'])
    ->name('cadastrar_membro');

    Route::get('/editar/{id}',[App\Http\Controllers\MembroControlador::class, 'editar'])
    ->name('formulario_editar_membro')
    ->where('id', '[0-9]+');

    Route::post('/alterar',[App\Http\Controllers\MembroControlador::class, 'alterar'])
    ->name('alterar_membro');

    Route::get('/excluir/{id}',[App\Http\Controllers\MembroControlador::class, 'excluir'])
    ->name('excluir_membro')
    ->where('id', '[0-9]+');

    Route::get('/falecido/{id}',[App\Http\Controllers\MembroControlador::class, 'falecido'])
    ->name('falecido_membro')
    ->where('id', '[0-9]+');

    Route::get('/ativo/{id}',[App\Http\Controllers\MembroControlador::class, 'ativo'])
    ->name('ativo_membro')
    ->where('id', '[0-9]+');
});

Route::prefix('bixos')->group(function () {

    Route::get('/',[App\Http\Controllers\BixoControlador::class, 'listar'])
    ->name('listar_bixos');

    Route::get('/promocao-bixo-a-morador/{id}',[App\Http\Controllers\BixoControlador::class, 'promocaoMorador'])
    ->name('promocao_bixo_a_morador')
    ->where('id', '[0-9]+');

});

Route::prefix('moradores')->group(function () {

    Route::get('/',[App\Http\Controllers\MoradorControlador::class, 'listar'])
    ->name('listar_moradores');

});

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
  ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
