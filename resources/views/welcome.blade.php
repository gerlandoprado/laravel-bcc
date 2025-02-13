@extends('layouts.app')

@section('content')
<div class="container-fluid p-0 mb-4">
    <img src="{{ asset('images/banner.png') }}" alt="Banner" class="img-fluid w-100" style="margin-top: -3rem;">
</div>

<div class="container mt-4">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach($carros as $carro)
        <div class="col">
            <div class="card h-100">
                @if($carro->imagem)
                    <img src="{{ asset('/' . $carro->imagem) }}" class="card-img-top" alt="{{ $carro->modelo }}" style="height: 200px; object-fit: cover;">
                @else
                    <div class="bg-secondary text-white d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-car fa-3x"></i>
                    </div>
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $carro->modelo }}</h5>
                    <p class="card-text">
                        <strong>Marca:</strong> {{ $carro->marca }}<br>
                        <strong>Ano:</strong> {{ $carro->ano }}<br>
                        <strong>Preço Diária:</strong> R$ {{ number_format($carro->preco_diaria, 2, ',', '.') }}
                    </p>
                    <a href="{{ route('carros.show', $carro->id) }}" class="btn btn-success w-100">Alugar</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<style>
    .welcome-container {
        text-align: center;
        padding: 50px 20px;
        color: #FF7700;
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
        background-color: #FF7700;
        border: 2px solid #FF7700;
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
</div>
@endsection
