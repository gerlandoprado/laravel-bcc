@extends('layouts.app')

@section('content')
    <h1>Cadastrar Carro</h1>
    <form action="{{ route('carros.store') }}" method="POST">
        @csrf
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" required>
        
        <label for="marca">Marca:</label>
        <input type="text" name="marca" required>
        
        <label for="ano">Ano:</label>
        <input type="number" name="ano" required>
        
        <label for="preco_diaria">preco_diaria:</label>
        <input type="text" name="preco_diaria" required>
        
        <label for="opcionais">Opcionais:</label>
        <textarea name="opcionais"></textarea>
        
        <button type="submit">Cadastrar</button>
    </form>
@endsection