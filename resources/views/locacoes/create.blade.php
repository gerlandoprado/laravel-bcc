@extends('layouts.app')

@section('content')
    <h1>Cadastrar Locação</h1>
    <form action="{{ route('locacoes.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="carro_id">Carro:</label>
            <select name="carro_id" id="carro_id" class="form-control" required>
                <option value="">Selecione um carro</option>
                @foreach($carros as $carro)
                    <option value="{{ $carro->id }}">{{ $carro->modelo }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="cliente_id">Cliente:</label>
            <select name="cliente_id" id="cliente_id" class="form-control" required>
                <option value="">Selecione um cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="data_inicio">Data de Início:</label>
            <input type="date" name="data_inicio" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="data_fim">Data de Fim:</label>
            <input type="date" name="data_fim" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="valor_pago">Desconto:</label>
            <input type="number" name="valor_pago" class="form-control" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
@endsection