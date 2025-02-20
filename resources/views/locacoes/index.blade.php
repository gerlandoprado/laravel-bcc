@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2">Lista de Locações</h1>
            <a href="{{ route('locacoes.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Adicionar Locação</a>
        </div>

        @if(session('msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('msg') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-light">
                    <tr>
                        <th>Cliente</th>
                        <th>Carro</th>
                        <th>Data de Início</th>
                        <th>Data de Fim</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
        <tbody>
            @foreach($locacoes as $locacao)
                <tr>
                    <td>{{ $locacao->cliente->nome }}</td>
                    <td>{{ $locacao->carro->modelo }}</td>
                    <td>{{ $locacao->data_inicio }}</td>
                    <td>{{ $locacao->data_fim }}</td>
                    <td class="text-center">
                        <a href="{{ route('locacoes.show', $locacao->id) }}" class="btn btn-sm btn-info me-1">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('locacoes.edit', $locacao->id) }}" class="btn btn-sm btn-warning me-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('locacoes.destroy', $locacao->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta locação?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
            </table>
        </div>
    </div>
@endsection