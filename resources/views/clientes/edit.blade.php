@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Editar Cliente</h1>
        <form action="{{ route('clientes.update', $cliente->id) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" name="nome" id="nome" value="{{ $cliente->nome }}" required>
            </div>
            
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF:</label>
                <input type="text" class="form-control" name="cpf" id="cpf" value="{{ $cliente->cpf }}" required>
            </div>
            
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ $cliente->email }}" required>
            </div>
            
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone:</label>
                <input type="text" class="form-control" name="telefone" id="telefone" value="{{ $cliente->telefone }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary" style="background-color: #ff6b00; border-color: #ff6b00;">Atualizar</button>
        </form>
    </div>
    </form>
@endsection