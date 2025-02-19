<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Locacao;

class HistoricoController extends Controller
{
    /**
     *
     * @param string $cpf
     * @return \Illuminate\View\View
     */
    public function show($cpf)
    {
        // Busca o cliente pelo CPF
        $cliente = Cliente::where('cpf', $cpf)->first();

        // Verifica se o cliente foi encontrado
        if ($cliente) {
            // Busca as locações do cliente
            $locacoes = Locacao::where('cliente_id', $cliente->id)->with('carro')->get();
            return view('historico.index', compact('cliente', 'locacoes'));
        } else {
            return view('historico.index')->with('msg', 'Cliente não encontrado!');
        }
    }
}