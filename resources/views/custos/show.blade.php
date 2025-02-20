@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-white border-bottom-0 pt-4 pb-0">
                    <h2 class="mb-0 h3 text-dark">Detalhes do Custo</h2>
                </div>
                <div class="card-body pt-4">
                    <div class="row g-4 mb-4">
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded-3">
                                <h6 class="text-muted mb-2">Descrição</h6>
                                <p class="mb-0 fw-medium">{{ $custo->descricao }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded-3">
                                <h6 class="text-muted mb-2">Valor</h6>
                                <p class="mb-0 fw-medium">R$ {{ number_format($custo->valor, 2, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-light rounded-3">
                                <h6 class="text-muted mb-2">Data</h6>
                                <p class="mb-0 fw-medium">{{ \Carbon\Carbon::parse($custo->data)->format('d/m/Y') }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex gap-3">
                        <a href="{{ route('custos.edit', $custo->id) }}" class="btn btn-primary px-4" style="background-color: #FF7700; border-color: #FF7700;">
                            <i class="bi bi-pencil-square me-2"></i>Editar
                        </a>
                        <form action="{{ route('custos.destroy', $custo->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger px-4" onclick="return confirm('Tem certeza que deseja excluir este custo?')">
                                <i class="bi bi-trash me-2"></i>Excluir
                            </button>
                        </form>
                        <a href="{{ route('custos.index') }}" class="btn btn-outline-secondary px-4">
                            <i class="bi bi-arrow-left me-2"></i>Voltar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection