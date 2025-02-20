<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Locacao;

class ClienteController extends Controller
{

    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index')->with('clientes', $clientes);
    }


    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->cpf = $request->input('cpf');
        $cliente->telefone = $request->input('telefone');
        $cliente->email = $request->input('email');
        $cliente->endereco = $request->input('endereco');
        $cliente->save();

        $clientes = Cliente::all();
        return view('clientes.index')->with('clientes', $clientes)
            ->with('msg', 'Cliente cadastrado com sucesso!');
    }


    public function show($id)
    {
        $cliente = Cliente::find($id);
        $clientes = Cliente::all(); 

        if ($cliente) {
            // Busca as locações do cliente
            $locacoes = Locacao::where('cliente_id', $cliente->id)->with('carro')->get();
            return view('clientes.show', compact('cliente', 'locacoes', 'clientes'));
        } else {
            return view('clientes.show')->with('msg', 'Cliente não encontrado!');
        }
    }


    public function edit($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            return view('clientes.edit')->with('cliente', $cliente);
        } else {
            $clientes = Cliente::all();
            return view('clientes.index')->with('clientes', $clientes)
                ->with('msg', 'Cliente não encontrado!');
        }
    }


    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $cliente->nome = $request->input('nome');
            $cliente->cpf = $request->input('cpf');
            $cliente->email = $request->input('email');
            $cliente->telefone = $request->input('telefone');
            $cliente->endereco = $request->input('endereco');
            $cliente->save();

            $clientes = Cliente::all();
            return view('clientes.index')->with('clientes', $clientes)
                ->with('msg', 'Cliente atualizado com sucesso!');
        } else {
            return redirect()->route('clientes.index')->with('msg', 'Cliente não encontrado!');
        }
    }


    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $cliente->delete();
            $clientes = Cliente::all();
            return view('clientes.index')->with('clientes', $clientes)
                ->with('msg', 'Cliente excluído com sucesso!');
        } else {
            return redirect()->route('clientes.index')->with('msg', 'Cliente não encontrado!');
        }
    }
}