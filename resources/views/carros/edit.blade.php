@extends('layouts.app')

@section('content')
    <h1>Editar Carro</h1>
    <form action="{{ route('carros.update', $carro->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" value="{{ $carro->modelo }}" required>
        
        <label for="marca">Marca:</label>
        <input type="text" name="marca" value="{{ $carro->marca }}" required>
        
        <label for="ano">Ano:</label>
        <input type="number" name="ano" value="{{ $carro->ano }}" required>
        
        <label for="preco_diaria">preco_diaria:</label>
        <input type="text" name="preco_diaria" value="{{ $carro->preco_diaria }}" required>
        
        <label for="opcionais">Opcionais:</label>
        <textarea name="opcionais">{{ $carro->opcionais }}</textarea>
        
        <button type="submit">Atualizar</button>
    </form>
@endsection