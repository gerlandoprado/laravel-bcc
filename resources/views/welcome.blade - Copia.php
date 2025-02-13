@extends('layouts.welcome')

@section('content')
<style>
    body {
        background-color: #FF7700;
    }
    .welcome-container {
        text-align: center;
        padding: 50px 20px;
        color: white;
    }
    .brand-name {
        font-size: 4rem;
        font-weight: bold;
        margin-bottom: 40px;
    }
    .nav-buttons {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
    }
    .nav-button {
        background-color: transparent;
        border: 2px solid white;
        color: white;
        padding: 15px 30px;
        font-size: 1.2rem;
        border-radius: 5px;
        text-decoration: none;
        transition: all 0.3s ease;
    }
    .nav-button:hover {
        background-color: white;
        color: #FF7700;
    }
    .search-container {
        margin: 20px 0;
        text-align: center;
    }
    .car-list {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
    }
    .car-card {
        background-color: white;
        color: black;
        padding: 20px;
        border-radius: 10px;
        width: 200px;
        text-align: center;
    }
    .car-card img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }
</style>

<div class="welcome-container">
    <h1 class="brand-name">Carluguel</h1>
    <p style="font-size: 1.5rem; margin-bottom: 30px;">Bem-vindo, selecione uma das opções:</p>
    <div class="nav-buttons">
        <a href="/carros" class="nav-button">Carros</a>
        <a href="/locacoes" class="nav-button">Locações</a>
        <a href="/clientes" class="nav-button">Clientes</a>
        <a href="/custos" class="nav-button">Custos</a>
    </div>

    <div class="search-container">
        <form action="{{ route('welcome') }}" method="GET">
            <input type="text" name="search" placeholder="Pesquisar carro..." class="form-control" style="width: 300px; margin: 0 auto;">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </form>
    </div>

    <div class="car-list">
        @foreach($carros as $carro)
            <div class="car-card">
                <img src="{{ asset('storage/' . $carro->imagem) }}" alt="Imagem do Carro">
                <h3>{{ $carro->modelo }}</h3>
                <p><strong>Marca:</strong> {{ $carro->marca }}</p>
                <p><strong>Ano:</strong> {{ $carro->ano }}</p>
                <p><strong>Preço Diário:</strong> R$ {{ number_format($carro->preco_diaria, 2, ',', '.') }}</p>
                @if($carro->opcionais)
                    <p><strong>Opcionais:</strong> {{ $carro->opcionais }}</p>
                @endif
            </div>
        @endforeach
    </div>
</div>
@endsection