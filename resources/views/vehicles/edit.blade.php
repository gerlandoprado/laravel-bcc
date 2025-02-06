@extends('base')
@section('content')
    <h2>Atualizar um Veículo</h2>
    <form class="form" id="update-form" method="POST" action="{{ route('vehicles.update', $vehicle->id) }}">
        @csrf
        @method('PUT')
        <label for="Nome">Nome:</label>
        <input type="text" name="name" id="name" required value="{{ $vehicle->name }}">
        <label for="Nome">Ano:</label>
        <input type="number" name="year" id="year" required value="{{ $vehicle->year }}">
        <label for="Nome">Cor:</label>
        <input type="text" name="color" id="color" required value="{{ $vehicle->color }}">
    </form>
    <button form="update-form" type="submit">Salvar</button>
    <button form="delete-form" type="submit" value="Excluir" >Excluir</button>
    <form method="POST" class="form" id="delete-form" action="{{ route('vehicles.destroy', $vehicle->id) }}">
        @csrf
        @method('DELETE')
    </form>
@endsection