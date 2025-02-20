@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h2">Lista de Carros</h1>
            <a href="{{ route('carros.create') }}" class="btn btn-success"><i class="fas fa-plus"></i> Adicionar Carro</a>
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
                        <th>Modelo</th>
                        <th>Marca</th>
                        <th>Ano</th>
                        <th>Preço Diária</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
        <tbody>
            @foreach($carros as $carro)
                <tr>
                    <td>{{ $carro->modelo }}</td>
                    <td>{{ $carro->marca }}</td>
                    <td>{{ $carro->ano }}</td>
                    <td>{{ $carro->preco_diaria }}</td>
                    <td class="text-center">
                        <a href="{{ route('carros.show', $carro->id) }}" class="btn btn-sm btn-info me-1">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="{{ route('carros.edit', $carro->id) }}" class="btn btn-sm btn-warning me-1">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('carros.destroy', $carro->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este carro?')">
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