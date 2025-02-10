@extends('layouts.app')

@section('content')
    <h1>Lista de Carros</h1>
    <a href="{{ route('carros.create') }}">Adicionar Carro</a>
    @if(session('msg'))
        <div>{{ session('msg') }}</div>
    @endif
    <table>
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
                        <a href="{{ route('carros.edit', $carro->id) }}">Editar</a>
                        <form action="{{ route('carros.destroy', $carro->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                        <a href="{{ route('carros.show', $carro->id) }}">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection