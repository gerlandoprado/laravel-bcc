@extends('layouts.app')

@section('content')
    <h1>Editar Custo</h1>
    <form action="{{ route('custos.update', $custo->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" value="{{ $custo->descricao }}" required>
        
        <label for="valor">Valor:</label>
        <input type="text" name="valor" value="{{ $custo->valor }}" required>
        
        <label for="data">Data:</label>
        <input type="date" name="data" value="{{ $custo->data }}" required> <!-- Campo para a data -->
        
        <button type="submit">Atualizar</button>
    </form>
@endsection