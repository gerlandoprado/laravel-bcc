@extends('base')
@section('content')
    @if (isset($msg))
        <h3 style="color: red">Veículo não encontrado!</h3>
    @else
        <h2>Mostrando dados do veículo</h2>
        <p><strong>Nome:</strong> {{ $vehicle->name }} </p>
        <p><strong>Ano:</strong> {{ $vehicle->year }} </p>
        <p><strong>Cor:</strong> {{ $vehicle->color }} </p>
        <a href="{{ route('vehicles.index') }}">Voltar</a>
    @endif
@endsection