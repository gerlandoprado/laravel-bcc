@extends('layouts.app')

@section('content')
    <h1>Detalhes do Carro</h1>
    <p><strong>Modelo:</strong> {{ $carro->modelo }}</p>
    <p><strong>Marca:</strong> {{ $carro->marca }}</p>
    <p><strong>Ano:</strong> {{ $carro->ano }}</p>
    <p><strong>preco_diaria:</strong> {{ $carro->preco_diaria }}</p>
    <p><strong>Opcionais:</strong> {{ $carro->opcionais }}</p>
    <a href="{{ route('carros.index') }}">Voltar</a>
@endsection