@extends('layouts.app')

@section('content')
    <h1>Editar Locação</h1>
    <form action="{{ route('locacoes.update', $locacao->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="carro_id">Carro:</label>
            <select name="carro_id" id="carro_id" class="form-control" required>
                @foreach($carros as $carro)
                    <option value="{{ $carro->id }}" {{ $carro->id == $locacao->carro_id ? 'selected' : '' }}>{{ $carro->modelo }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="cliente_id">Cliente:</label>
            <select name="cliente_id" id="cliente_id" class="form-control" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" {{ $cliente->id == $locacao->cliente_id ? 'selected' : '' }}>{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="data_inicio">Data de Início:</label>
            <input type="date" name="data_inicio" class="form-control" value="{{ $locacao->data_inicio }}" required>
        </div>

        <div class="form-group">
            <label for="data_fim">Data de Fim:</label>
            <input type="date" name="data_fim" class="form-control" value="{{ $locacao->data_fim }}" required>
        </div>

        <div class="form-group">
            <label for="valor_pago">Valor Pago:</label>
            <input type="number" name="valor_pago" class="form-control" value="{{ $locacao->valor_pago }}" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-success">Atualizar</button>
    </form>
@endsection