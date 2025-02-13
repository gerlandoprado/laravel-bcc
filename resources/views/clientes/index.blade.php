@extends('layouts.app')

@section('content')
    <h1>Lista de Clientes</h1>
    
    @if(session('msg'))
        <div class="alert alert-success">{{ session('msg') }}</div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->cpf }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-primary">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                        <a href="{{ route('clientes.show', $cliente->id) }}" class="btn btn-sm btn-info">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">Adicionar Cliente</a>
@endsection