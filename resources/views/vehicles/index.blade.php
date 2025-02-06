@extends('base')
@section('content')
    <h2>Veículos Cadastrados</h2>
    @if (!isset($vehicles))
        <h3 style="color: red">Nenhum Registro Encontrado!</h3>
    @else
        <table class="data-table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Ano</th>
                    <th>Cor</th>
                    <th colspan="2">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $v)
                    <tr>
                        <td>{{ $v->name }} </td>
                        <td> {{ $v->year }} </td>
                        <td> {{ $v->color }} </td>
                        <td> <a href="{{ route('vehicles.show', $v->id) }}">Exibir</a> </td>
                        <td> <a href="{{ route('vehicles.edit', $v->id) }}">Editar</a> </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">Veículos Cadastrados: {{ $vehicles->count() }}</td>
                </tr>
            </tfoot>
        </table>
    @endif
    @if(isset($msg))
        <script>
            alert("{{$msg}}");
        </script>
    @endif
@endsection