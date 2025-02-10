@extends('layouts.app')

@section('content')
    <h1>Detalhes do Cliente</h1>
    <p><strong>Nome:</strong> {{ $cliente->nome }}</p>
    <p><strong>cpf:</strong> {{ $cliente->cpf }}</p>
    <p><strong>Email:</strong> {{ $cliente->email }}</p>
    <p><strong>Telefone:</strong> {{ $cliente->telefone }}</p>
    <a href="{{ route('clientes.index') }}">Voltar</a>
@endsection