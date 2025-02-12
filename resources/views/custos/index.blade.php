@extends('layouts.app')

@section('content')
    <h1>Lista de Custos</h1>
    <a href="{{ route('custos.create') }}" class="btn btn-primary mb-3">Adicionar Custo</a>
    @if(session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Descrição</th>
                <th>Valor</th>
                <th>Data</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($custos as $custo)
                <tr>
                    <td>{{ $custo->descricao }}</td>
                    <td>{{ $custo->valor }}</td>
                    <td>{{ $custo->data }}</td> <!-- Exibe a data -->
                    <td>
                        <a href="{{ route('custos.edit', $custo->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('custos.destroy', $custo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                        <a href="{{ route('custos.show', $custo->id) }}" class="btn btn-sm btn-info">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection