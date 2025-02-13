@extends('layouts.app')

@section('content')
    <h1>Detalhes do Cliente</h1>
    <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
    <p><strong>CPF:</strong> {{ $cliente->cpf }}</p>
    <p><strong>Email:</strong> {{ $cliente->email }}</p>
    <p><strong>Telefone:</strong> {{ $cliente->telefone }}</p>

    <h2>Selecionar Cliente para Ver Histórico de Locações</h2>

    <form action="{{ route('historico.locacoes', ['cpf' => $cliente->cpf]) }}" method="GET">
        <label for="cliente">Escolha um cliente:</label>
        <select name="cliente_id" id="cliente">
            @foreach($clientes as $c)
                <option value="{{ $c->cpf }}" {{ $c->cpf == $cliente->cpf ? 'selected' : '' }}>
                    {{ $c->nome }} (CPF: {{ $c->cpf }})
                </option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary">Ver Histórico</button>
    </form>

    <h2>Histórico de Locações</h2>

    @if(isset($locacoes) && $locacoes->isEmpty())
        <p>Não há locações registradas para este cliente.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Modelo do Carro</th>
                    <th>Data de Início</th>
                    <th>Data de Fim</th>
                    <th>Valor Pago</th>
                </tr>
            </thead>
            <tbody>
                @foreach($locacoes as $locacao)
                    <tr>
                        <td>{{ $locacao->carro->modelo }}</td>
                        <td>{{ $locacao->data_inicio }}</td>
                        <td>{{ $locacao->data_fim }}</td>
                        <td>R$ {{ number_format($locacao->valor_pago, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Voltar</a>
@endsection