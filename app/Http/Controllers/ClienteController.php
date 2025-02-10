<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index')->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            return view('clientes.show')->with('cliente', $cliente);
        } else {
            return view('clientes.show')->with('msg', 'Cliente não encontrado!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $cliente = Cliente::find($id);
        if ($cliente) {
            $cliente->nome = $request->input('nome');
            $cliente->documento = $request->input('documento');
            $cliente->email = $request->input('email');
            $cliente->telefone = $request->input('telefone');
            $cliente->save();

            $clientes = Cliente::all();
            return view('clientes.index')->with('clientes', $clientes)
                ->with('msg', 'Cliente atualizado com sucesso!');
        } else {
            return redirect()->route('clientes.index')->with('msg', 'Cliente não encontrado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
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