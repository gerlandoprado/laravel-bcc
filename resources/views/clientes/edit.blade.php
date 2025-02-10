@extends('layouts.app')

@section('content')
    <h1>Editar Cliente</h1>
    <form action="{{ route('clientes.update', $cliente->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="{{ $cliente->nome }}" required>
        
        <label for="cpf">cpf:</label>
        <input type="text" name="cpf" value="{{ $cliente->cpf }}" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ $cliente->email }}" required>
        
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" value="{{ $cliente->telefone }}" required>
        
        <button type="submit">Atualizar</button>
    </form>
@endsection