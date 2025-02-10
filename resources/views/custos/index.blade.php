@extends('layouts.app')

@section('content')
    <h1>Lista de Custos</h1>
    <table>
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
                        <a href="{{ route('custos.edit', $custo->id) }}">Editar</a>
                        <form action="{{ route('custos.destroy', $custo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection