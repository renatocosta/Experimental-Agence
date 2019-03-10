<?php

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
    return 'Testing Agence';
});

Route::get('/consultants', function () {
    $consultants = App\CAO_USUARIO::with('permissoes')
                   ->select(['cao_usuario.co_usuario', 'cao_usuario.no_usuario'])
                   ->join('permissao_sistema', 'cao_usuario.co_usuario', '=', 'permissao_sistema.co_usuario')                    
                   ->where('permissao_sistema.co_sistema', 1)
                   ->where('permissao_sistema.in_ativo', 'S')
                   ->whereIn('permissao_sistema.co_tipo_usuario', App\TIPO_USUARIO::TIPOS)->get();    
    return $consultants;
});

Route::get('/clients', function () {
    $clients = App\CAO_CLIENTES::select(['co_cliente','no_razao'])->where('TP_CLIENTE', 'A')->get();    
    return $clients;
});