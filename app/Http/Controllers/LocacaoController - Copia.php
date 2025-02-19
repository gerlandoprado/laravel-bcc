<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Locacao;
use App\Models\Carro;
use App\Models\Cliente;

class LocacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locacoes = Locacao::with(['carro', 'cliente'])->get();
        return view('locacoes.index')->with('locacoes', $locacoes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $carros = Carro::all();
        $clientes = Cliente::all();
        return view('locacoes.create', compact('carros', 'clientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'carro_id' => 'required|exists:carros,id',
            'cliente_id' => 'required|exists:clientes,id',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after:data_inicio',
            'valor_pago' => 'required|numeric',
        ]);

        $locacao = new Locacao();
        $locacao->carro_id = $request->input('carro_id');
        $locacao->cliente_id = $request->input('cliente_id');
        $locacao->data_inicio = $request->input('data_inicio');
        $locacao->data_fim = $request->input('data_fim');
        $locacao->valor_pago = $request->input('valor_pago');
        $locacao->save();

        return redirect()->route('locacoes.index')->with('msg', 'Locação cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $locacao = Locacao::with(['carro', 'cliente'])->find($id);
        if ($locacao) {
            return view('locacoes.show')->with('locacao', $locacao);
        } else {
            return redirect()->route('locacoes.index')->with('msg', 'Locação não encontrada!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $locacao = Locacao::find($id);
        if ($locacao) {
            $carros = Carro::all();
            $clientes = Cliente::all();
            return view('locacoes.edit')->with(['locacao' => $locacao, 'carros' => $carros, 'clientes' => $clientes]);
        } else {
            return redirect()->route('locacoes.index')->with('msg', 'Locação não encontrada!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'carro_id' => 'required|exists:carros,id',
            'cliente_id' => 'required|exists:clientes,id',
            'data_inicio' => 'required|date',
            'data_fim' => 'required|date|after:data_inicio',
            'valor_pago' => 'required|numeric',
        ]);

        $locacao = Locacao::find($id);
        if ($locacao) {
            $locacao->carro_id = $request->input('carro_id');
            $locacao->cliente_id = $request->input('cliente_id');
            $locacao->data_inicio = $request->input('data_inicio');
            $locacao->data_fim = $request->input('data_fim');
            $locacao->valor_pago = $request->input('valor_pago');
            $locacao->save();

            return redirect()->route('locacoes.index')->with('msg', 'Locação atualizada com sucesso!');
        } else {
            return redirect()->route('locacoes.index')->with('msg', 'Locação não encontrada!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $locacao = Locacao::find($id);
        if ($locacao) {
            $locacao->delete();
            return redirect()->route('locacoes.index')->with('msg', 'Locação excluída com sucesso!');
        } else {
            return redirect()->route('locacoes.index')->with('msg', 'Locação não encontrada!');
        }
    }
}