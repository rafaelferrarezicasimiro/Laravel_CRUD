<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;

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
    return view('welcome');
});

Route::get('/clientes', function () {
    return view('clientes_index');
});

Route::get('/clientes/criar', function () {
    return view('clientes_criar');
});

Route::get('/clientes/alterar/{id}', function () {
    return view('clientes_editar');
});

Route::get('/clientes/listar', [ClientesController::class, 'listar']);
Route::post('/clientes/cadastrar', [ClientesController::class, 'cadastrar']);
Route::post('/clientes/alterar', [ClientesController::class, 'alterar']);
Route::get('/clientes/carregar/{id}', [ClientesController::class, 'carregar']);
Route::post('/clientes/desativar/{id}', [ClientesController::class, 'desativar']);
