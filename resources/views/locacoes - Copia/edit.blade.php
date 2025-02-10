@extends('layouts.app')

@section('content')
    <h1>Editar Locação</h1>
    <form action="{{ route('locacoes.update', $locacao->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="cliente_id ">Cliente:</label>
        <select name="cliente_id" required>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ $locacao->cliente_id == $cliente->id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
            @endforeach
        </select>
        
        <label for="carro_id">Carro:</label>
        <select name="carro_id" required>
            @foreach($carros as $carro)
                <option value="{{ $carro->id }}" {{ $locacao->carro_id == $carro->id ? 'selected' : '' }}>{{ $carro->modelo }}</option>
            @endforeach
        </select>
        
        <label for="data_inicio">Data de Início:</label>
        <input type="date" name="data_inicio" value="{{ $locacao->data_inicio }}" required>
        
        <label for="data_fim">Data de Fim:</label>
        <input type="date" name="data_fim" value="{{ $locacao->data_fim }}" required>
        
        <button type="submit">Atualizar</button>
    </form>
@endsection