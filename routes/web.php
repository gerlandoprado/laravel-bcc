<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\LocacaoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CustoController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('carros', CarroController::class);
Route::resource('locacoes', LocacaoController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('custos', CustoController::class);