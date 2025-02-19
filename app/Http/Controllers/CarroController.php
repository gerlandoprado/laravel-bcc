<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carro;
use Illuminate\Support\Facades\Storage;

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
        // Validação dos dados
        $request->validate([
            'modelo' => 'required',
            'marca' => 'required',
            'ano' => 'required|integer',
            'preco_diaria' => 'required|numeric',
            'opcionais' => 'nullable|string',
            'imagem' => 'image|nullable|max:2048', // Validação da imagem
        ]);

        $carro = new Carro();
        $carro->modelo = $request->input('modelo');
        $carro->marca = $request->input('marca');
        $carro->ano = $request->input('ano');
        $carro->preco_diaria = $request->input('preco_diaria');
        $carro->opcionais = $request->input('opcionais');

        if ($request->hasFile('imagem')) {
            $imagem = $request->file('imagem');
            $nomeImagem = time() . '_' . rand(1000, 9999) . '.' . $imagem->getClientOriginalExtension();
            $imagem->move(public_path('images/carros'), $nomeImagem);
            $carro->imagem = 'images/carros/' . $nomeImagem;
        }


        // Salvar a imagem
        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('imagens', 'public'); // Salva a imagem na pasta public/imagens
            $carro->imagem = $path; // Armazena o caminho da imagem no banco de dados
        }

        $carro->save();

        return redirect()->route('carros.index')->with('msg', 'Carro cadastrado com sucesso!');
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
            return redirect()->route('carros.index')->with('msg', 'Carro não encontrado!');
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
            return redirect()->route('carros.index')->with('msg', 'Carro não encontrado!');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $carro = Carro::find($id);
        if ($carro) {
            // Validação dos dados
            $request->validate([
                'modelo' => 'required',
                'marca' => 'required',
                'ano' => 'required|integer',
                'preco_diaria' => 'required|numeric',
                'opcionais' => 'nullable|string',
                'imagem' => 'image|nullable|max:2048', // Validação da imagem
            ]);

            $carro->modelo = $request->input('modelo');
            $carro->marca = $request->input('marca');
            $carro->ano = $request->input('ano');
            $carro->preco_diaria = $request->input('preco_diaria');
            $carro->opcionais = $request->input('opcionais');

            // Salvar a nova imagem, se fornecida
            if ($request->hasFile('imagem')) {
                $path = $request->file('imagem')->store('imagens', 'public'); // Salva a imagem na pasta public/imagens
                $carro->imagem = $path; // Armazena o caminho da imagem no banco de dados
            }

            $carro->save();

            return redirect()->route('carros.index')->with('msg', 'Carro atualizado com sucesso!');
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
            return redirect()->route('carros.index')->with('msg', 'Carro excluído com sucesso!');
        } else {
            return redirect()->route('carros.index')->with('msg', 'Carro não encontrado!');
        }
    }
}