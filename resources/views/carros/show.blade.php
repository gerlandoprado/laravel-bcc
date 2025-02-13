@extends('layouts.app')

@section('content')
    <h1>Detalhes do Carro</h1>
    
    <p><strong>Modelo:</strong> {{ $carro->modelo }}</p>
    <p><strong>Marca:</strong> {{ $carro->marca }}</p>
    <p><strong>Ano:</strong> {{ $carro->ano }}</p>
    <p><strong>Preço Diário:</strong> R$ {{ number_format($carro->preco_diaria, 2, ',', '.') }}</p>
    <p><strong>Opcionais:</strong> {{ $carro->opcionais }}</p>

    @if($carro->imagem) <!-- Verifica se a imagem existe -->
        <div>
            <strong>Imagem:</strong><br>
            <img src="{{ asset('storage/' . $carro->imagem) }}" alt="Imagem do Carro" style="width: 300px; height: auto;"> <!-- Exibe a imagem -->
        </div>
    @else
        <p>Nenhuma imagem disponível.</p> 
    @endif

    <a href="{{ route('carros.index') }}" class="btn btn-primary">Voltar</a>
@endsection