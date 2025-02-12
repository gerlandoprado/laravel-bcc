@extends('layouts.app')

@section('content')
    <h1>Lista de Carros</h1>
    <a href="{{ route('carros.create') }}" class="btn btn-primary mb-3">Adicionar Carro</a>
    @if(session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Ano</th>
                <th>preco_diaria</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carros as $carro)
                <tr>
                    <td>{{ $carro->modelo }}</td>
                    <td>{{ $carro->marca }}</td>
                    <td>{{ $carro->ano }}</td>
                    <td>{{ $carro->preco_diaria }}</td>
                    <td>
                        <a href="{{ route('carros.edit', $carro->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('carros.destroy', $carro->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                        <a href="{{ route('carros.show', $carro->id) }}" class="btn btn-sm btn-info">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection