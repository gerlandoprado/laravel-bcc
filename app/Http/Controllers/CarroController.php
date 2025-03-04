<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;

class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $carros = Carro::all();
        return view('carros.index')->with('carros', $carros);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $carro = new Carro();
        $carro->modelo = $request->input('modelo');
        $carro->marca = $request->input('marca');
        $carro->ano = $request->input('ano');
        $carro->preco_diaria = $request->input('preco_diaria');
        $carro->opcionais = $request->input('opcionais');

        // Handle image upload
        if ($request->hasFile('imagem')) {
            $image = $request->file('imagem');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/carros'), $imageName);
            $carro->imagem = 'images/carros/' . $imageName;
        }

        $carro->save();

        $carros = Carro::all();
        return view('carros.index')->with('carros', $carros)
            ->with('msg', 'Carro cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $carro = Carro::find($id);
        if ($carro) {
            return view('carros.show')->with('carro', $carro);
        } else {
            return view('carros.show')->with('msg', 'Carro não encontrado!');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $carro = Carro::find($id);
        if ($carro) {
            return view('carros.edit')->with('carro', $carro);
        } else {
            $carros = Carro::all();
            return view('carros.index')->with('carros', $carros)
                ->with('msg', 'Carro não encontrado!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $carro = Carro::find($id);
        if ($carro) {
            $carro->modelo = $request->input('modelo');
            $carro->marca = $request->input('marca');
            $carro->ano = $request->input('ano');
            $carro->preco_diaria = $request->input('preco_diaria');
            $carro->opcionais = $request->input('opcionais');
            $carro->save();

            $carros = Carro::all();
            return view('carros.index')->with('carros', $carros)
                ->with('msg', 'Carro atualizado com sucesso!');
        } else {
            return redirect()->route('carros.index')->with('msg', 'Carro não encontrado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $carro = Carro::find($id);
        if ($carro) {
            $carro->delete();
            $carros = Carro::all();
            return view('carros.index')->with('carros', $carros)
                ->with('msg', 'Carro excluído com sucesso!');
        } else {
            return redirect()->route('carros.index')->with('msg', 'Carro não encontrado!');
        }
    }
}