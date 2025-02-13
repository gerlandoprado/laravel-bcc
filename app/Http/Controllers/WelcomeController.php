<?php

namespace App\Http\Controllers;

use App\Models\Carro;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');
        
        if ($query) {
            $carros = Carro::where('modelo', 'LIKE', "%{$query}%")->get();
        } else {
            $carros = Carro::all();
        }

        return view('welcome', compact('carros')); 
    }
}