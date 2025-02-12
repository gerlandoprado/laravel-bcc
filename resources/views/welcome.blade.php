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
