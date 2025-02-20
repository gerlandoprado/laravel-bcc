@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <h2 class="mb-0">Detalhes da Locação</h2>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="text-muted">Cliente</label>
                    @php
                        $cliente = json_decode($locacao->cliente);
                    @endphp
                    <p class="h5">{{ $cliente->nome }}</p>
                    <p class="text-muted mb-0">CPF: {{ $cliente->cpf }}</p>
                    <p class="text-muted mb-0">Telefone: {{ $cliente->telefone }}</p>
                    <p class="text-muted mb-0">Email: {{ $cliente->email }}</p>
                </div>
                <div class="col-md-6">
                    <label class="text-muted">Carro</label>
                    @php
                        $carro = json_decode($locacao->carro);
                    @endphp
                    <p class="h5">{{ $carro->modelo }} {{ $carro->marca }}</p>
                    <p class="text-muted mb-0">Ano: {{ $carro->ano }}</p>
                    <p class="text-muted mb-0">Preço Diária: R$ {{ number_format($carro->preco_diaria, 2, ',', '.') }}</p>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="text-muted">Data de Início</label>
                    <p class="h5">{{ date('d/m/Y', strtotime($locacao->data_inicio)) }}</p>
                </div>
                <div class="col-md-6">
                    <label class="text-muted">Data de Fim</label>
                    <p class="h5">{{ date('d/m/Y', strtotime($locacao->data_fim)) }}</p>
                </div>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('locacoes.edit', $locacao->id) }}" class="btn btn-success">
                    <i class="fas fa-edit me-1"></i> Editar
                </a>
                <form action="{{ route('locacoes.destroy', $locacao->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta locação?')">
                        <i class="fas fa-trash me-1"></i> Excluir
                    </button>
                </form>
                <a href="{{ route('locacoes.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-1"></i> Voltar
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .btn-success {
        background-color: #FF7700;
        border-color: #FF7700;
    }
    
    .btn-success:hover {
        background-color: #e66a00;
        border-color: #e66a00;
    }
    
    .card {
        border-radius: 8px;
        border: none;
    }
    
    .card-header {
        border-bottom: 1px solid rgba(0,0,0,.125);
    }
    
    .h5 {
        color: #333;
        margin-bottom: 0;
    }
    
    .text-muted {
        font-size: 0.875rem;
    }
</style>
@endsection