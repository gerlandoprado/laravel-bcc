@extends('layouts.app')

@section('content')
<h1 class="mb-4">Editar Carro</h1>

<form action="{{ route('carros.update', $carro->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label for="modelo">Modelo:</label>
        <input type="text" class="form-control" id="modelo" name="modelo" value="{{ $carro->modelo }}" required>
    </div>
    
    <div class="mb-3">
        <label for="marca">Marca:</label>
        <input type="text" class="form-control" id="marca" name="marca" value="{{ $carro->marca }}" required>
    </div>
    
    <div class="mb-3">
        <label for="ano">Ano:</label>
        <input type="number" class="form-control" id="ano" name="ano" value="{{ $carro->ano }}" required>
    </div>
    
    <div class="mb-3">
        <label for="preco_diaria">Preço Diária:</label>
        <input type="text" class="form-control" id="preco_diaria" name="preco_diaria" value="{{ $carro->preco_diaria }}" required>
    </div>
    
    <div class="mb-3">
        <label for="opcionais">Opcionais:</label>
        <textarea class="form-control" id="opcionais" name="opcionais" rows="3">{{ $carro->opcionais }}</textarea>
    </div>
    
    <button type="submit" class="btn btn-primary" style="background-color: #FF7700; border-color: #FF7700;">Atualizar</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection