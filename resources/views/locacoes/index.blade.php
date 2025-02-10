@extends('layouts.app')

@section('content')
    <h1>Lista de Locações</h1>
    <a href="{{ route('locacoes.create') }}" class="btn btn-primary">Adicionar Locação</a>
    
    @if(session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    
    <table class="table">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Carro</th>
                <th>Data de Início</th>
                <th>Data de Fim</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($locacoes as $locacao)
                <tr>
                    <td>{{ $locacao->cliente->nome }}</td>
                    <td>{{ $locacao->carro->modelo }}</td>
                    <td>{{ $locacao->data_inicio }}</td>
                    <td>{{ $locacao->data_fim }}</td>
                    <td>
                        <a href="{{ route('locacoes.edit', $locacao->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('locacoes.destroy', $locacao->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                        <a href="{{ route('locacoes.show', $locacao->id) }}" class="btn btn-info">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection