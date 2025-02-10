@extends('layouts.app')

@section('content')
    <h1>Cadastrar Custo</h1>
    <form action="{{ route('custos.store') }}" method="POST">
        @csrf
        
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" required>
        
        <label for="valor">Valor:</label>
        <input type="text" name="valor" required>
        
        <label for="data">Data:</label>
        <input type="date" name="data" required> <!-- Campo para a data -->
        
        <button type="submit">Cadastrar</button>
    </form>
@endsection