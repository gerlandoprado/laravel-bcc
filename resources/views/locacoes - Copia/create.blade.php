@extends('layouts.app')

@section('content')
    <h1>Cadastrar Locação</h1>
    <form action="{{ route('locacoes.store') }}" method="POST">
        @csrf
        <label for="cliente_id">Cliente:</label>
        <select name="cliente_id" required>
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
            @endforeach
        </select>
        
        <label for="carro_id">Carro:</label>
        <select name="carro_id" required>
            @foreach($carros as $carro)
                <option value="{{ $carro->id }}">{{ $carro->modelo }}</option>
            @endforeach
        </select>
        
        <label for="data_inicio">Data de Início:</label>
        <input type="date" name="data_inicio" required>
        
        <label for="data_fim">Data de Fim:</label>
        <input type="date" name="data_fim" required>
        
        <button type="submit">Cadastrar</button>
    </form>
@endsection