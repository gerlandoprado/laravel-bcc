@extends('layouts.app')

@section('content')
    <h1>Detalhes do Custo</h1>
    <p><strong>Descrição:</strong> {{ $custo->descricao }}</p>
    <p><strong>Valor:</strong> {{ $custo->valor }}</p>
    <p><strong>Data:</strong> {{ $custo->data }}</p> <!-- Exibe a data -->
    
    <a href="{{ route('custos.edit', $custo->id) }}">Editar</a>
    <form action="{{ route('custos.destroy', $custo->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Excluir</button>
    </form>
    <a href="{{ route('custos.index') }}">Voltar</a>
@endsection