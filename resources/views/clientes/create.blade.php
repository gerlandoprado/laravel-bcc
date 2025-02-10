@extends('layouts.app')

@section('content')
    <h1>Cadastrar Cliente</h1>
    <form action="{{ route('clientes.store') }}" method="POST">
        @csrf
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required>
        
        <label for="cpf">cpf:</label>
        <input type="text" name="cpf" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        
        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" required>
        
        <button type="submit">Cadastrar</button>
    </form>
@endsection