@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Editar Custo</h1>
        <form action="{{ route('custos.update', $custo->id) }}" method="POST" class="needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <input type="text" class="form-control" name="descricao" id="descricao" value="{{ $custo->descricao }}" required>
            </div>
            
            <div class="mb-3">
                <label for="valor" class="form-label">Valor:</label>
                <input type="text" class="form-control" name="valor" id="valor" value="{{ $custo->valor }}" required>
            </div>
            
            <div class="mb-3">
                <label for="data" class="form-label">Data:</label>
                <input type="date" class="form-control" name="data" id="data" value="{{ $custo->data }}" required>
            </div>
            
            <button type="submit" class="btn btn-primary" style="background-color: #ff6b00; border-color: #ff6b00;">Atualizar</button>
        </form>
    </div>
    </form>
@endsection