<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarrosController extends Controller
{
    public function index()
    {
        $carros = Carro::all();
        return view('carros.index', compact('carros'));
    }

    public function create()
    {
        return view('carros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'modelo' => 'required',
            'marca' => 'required',
            'ano' => 'required|numeric',
            'preco_diaria' => 'required|numeric',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
            $imagem->move(public_path('images/carros'), $nomeImagem);
            $data['imagem'] = 'images/carros/' . $nomeImagem;
        }

        Carro::create($data);

        return redirect()->route('carros.index')
            ->with('success', 'Carro cadastrado com sucesso!');
    }

    public function edit(Carro $carro)
    {
        return view('carros.edit', compact('carro'));
    }

    public function update(Request $request, Carro $carro)
    {
        $request->validate([
            'modelo' => 'required',
            'marca' => 'required',
            'ano' => 'required|numeric',
            'preco_diaria' => 'required|numeric',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('imagem')) {
            // Delete old image
            if ($carro->imagem && file_exists(public_path($carro->imagem))) {
                unlink(public_path($carro->imagem));
            }

            $imagem = $request->file('imagem');
            $nomeImagem = time() . '.' . $imagem->getClientOriginalExtension();
            $imagem->move(public_path('images/carros'), $nomeImagem);
            $data['imagem'] = 'images/carros/' . $nomeImagem;
        }

        $carro->update($data);

        return redirect()->route('carros.index')
            ->with('success', 'Carro atualizado com sucesso!');
    }

    public function destroy(Carro $carro)
    {
        if ($carro->imagem && file_exists(public_path($carro->imagem))) {
            unlink(public_path($carro->imagem));
        }

        $carro->delete();

        return redirect()->route('carros.index')
            ->with('success', 'Carro excluído com sucesso!');
    }
}