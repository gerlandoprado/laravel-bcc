@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Cadastrar Custo</h1>
        <form action="{{ route('custos.store') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição:</label>
                <input type="text" class="form-control" name="descricao" id="descricao" required>
            </div>
            
            <div class="mb-3">
                <label for="valor" class="form-label">Valor:</label>
                <input type="text" class="form-control" name="valor" id="valor" required>
            </div>
            
            <div class="mb-3">
                <label for="data" class="form-label">Data:</label>
                <input type="date" class="form-control" name="data" id="data" required>
            </div>
            
            <button type="submit" class="btn btn-primary" style="background-color: #ff6b00; border-color: #ff6b00;">Cadastrar</button>
        </form>
    </div>
    </form>
@endsection