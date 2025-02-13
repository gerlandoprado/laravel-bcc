@extends('layouts.app')

@section('content')
    <h1>Cadastrar Carro</h1>

    <!-- Exibir mensagens de erro de validação -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('carros.store') }}" method="POST" enctype="multipart/form-data"> <!-- Adicione enctype -->
        @csrf
        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="marca">Marca:</label>
            <input type="text" name="marca" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="ano">Ano:</label>
            <input type="number" name="ano" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="preco_diaria">Preço Diário:</label>
            <input type="text" name="preco_diaria" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="opcionais">Opcionais:</label>
            <textarea name="opcionais" class="form-control"></textarea>
        </div>
        
        <div class="form-group">
            <label for="imagem">Imagem:</label> <!-- Novo campo para imagem -->
            <input type="file" name="imagem" class="form-control" accept="image/*"> <!-- Campo para upload de imagem -->
        </div>
        
        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
@endsection