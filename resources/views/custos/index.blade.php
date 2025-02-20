@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2">Lista de Custos</h1>
            <a href="{{ route('custos.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Adicionar Custo</a>
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
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Data</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
        <tbody>
            @foreach($custos as $custo)
                <tr>
                    <td>{{ $custo->descricao }}</td>
                    <td>{{ $custo->valor }}</td>
                    <td>{{ $custo->data }}</td> <!-- Exibe a data -->
                    <td class="text-center">
                        <a href="{{ route('custos.show', $custo->id) }}" class="btn btn-sm btn-info me-1">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('custos.edit', $custo->id) }}" class="btn btn-sm btn-warning me-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('custos.destroy', $custo->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este custo?')">
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