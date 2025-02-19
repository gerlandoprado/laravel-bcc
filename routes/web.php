<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\LocacaoController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CustoController;
use App\Http\Controllers\HistoricoController;
use App\Http\Controllers\WelcomeController;

Route::get('/', function () {
    $carros = \App\Models\Carro::all();
    return view('welcome', compact('carros'));
});

// Rotas de recursos
Route::resource('carros', CarroController::class);
Route::resource('locacoes', LocacaoController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('custos', CustoController::class);
Route::get('/historico-locacoes/{cpf}', [HistoricoController::class, 'show'])->name('historico.locacoes');