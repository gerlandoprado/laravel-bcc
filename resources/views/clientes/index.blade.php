@extends('layouts.app')

@section('content')
    <h1>Lista de Clientes</h1>
    <a href="{{ route('clientes.create') }}">Adicionar Cliente</a>
    @if(session('msg'))
        <div>{{ session('msg') }}</div>
    @endif
    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>cpf</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->cpf }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                        <a href="{{ route('clientes.show', $cliente->id) }}">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection