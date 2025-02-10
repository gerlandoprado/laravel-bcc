<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Custo;

class CustoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $custos = Custo::all();
        return view('custos.index')->with('custos', $custos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('custos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $custo = new Custo();
        $custo->descricao = $request->input('descricao');
        $custo->valor = $request->input('valor');
        $custo->data = $request->input('data');
        $custo->save();

        $custos = Custo::all();
        return view('custos.index')->with('custos', $custos)
            ->with('msg', 'Custo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $custo = Custo::find($id);
        if ($custo) {
            return view('custos.show')->with('custo', $custo);
        } else {
            return view('custos.show')->with('msg', 'Custo não encontrado!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $custo = Custo::find($id);
        if ($custo) {
            return view('custos.edit')->with('custo', $custo);
        } else {
            $custos = Custo::all();
            return view('custos.index')->with('custos', $custos)
                ->with('msg', 'Custo não encontrado!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $custo = Custo::find($id);
        if ($custo) {
            $custo->descricao = $request->input('descricao');
            $custo->valor = $request->input('valor');
            $custo->data = $request->input('data');
            $custo->save();

            $custos = Custo::all();
            return view('custos.index')->with('custos', $custos)
                ->with('msg', 'Custo atualizado com sucesso!');
        } else {
            return redirect()->route('custos.index')->with('msg', 'Custo não encontrado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $custo = Custo::find($id);
        if ($custo) {
            $custo->delete();
            $custos = Custo::all();
            return view('custos.index')->with('custos', $custos)
                ->with('msg', 'Custo excluído com sucesso!');
        } else {
            return redirect()->route('custos.index')->with('msg', 'Custo não encontrado!');
        }
    }
}