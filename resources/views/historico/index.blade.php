@extends('layouts.app')

@section('content')
    <h1>Histórico de Locações</h1>

    @if(isset($msg))
        <p>{{ $msg }}</p>
    @else
        <h2>Cliente: {{ $cliente->nome }} (CPF: {{ $cliente->cpf }})</h2>

        @if($locacoes->isEmpty())
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
    @endif

    <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-secondary">Voltar</a>
@endsection