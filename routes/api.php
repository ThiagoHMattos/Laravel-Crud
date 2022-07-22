<?php

use App\Http\Controllers\FuncionarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Rotas da APIREST da tabela Funcionário.
Route::get('/funcionario/index', array(FuncionarioController::class,'index'))->name('api.index');
Route::post('/funcionario/store', array(FuncionarioController::class,'store'))->name('api.store');
Route::get('/funcionario/edit/{id}',array(FuncionarioController::class,'edit'))->name('api.edit');
Route::put('/funcionario/update/{id}',array(FuncionarioController::class,'update'))->name('api.update');
Route::delete('/funcionario/delete/{id}',array(FuncionarioController::class, 'destroy'))->name('api.destroy');


//Rotas da APIREST da tabela Empresa.
Route::get('/empresa/index',array(EmpresaController::class, 'index'));
Route::post('/empresa/store', array(EmpresaController::class, 'store'));
Route::get('/empresa/edit/{id}',array(EmpresaController::class,'edit'));
Route::put('/empresa/update/{id}', array(EmpresaController::class, 'update'));
Route::delete('/empresa/delete/{id}',array(EmpresaController::class,'destroy'));
