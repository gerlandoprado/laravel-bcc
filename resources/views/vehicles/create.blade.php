@extends('base')
@section('content')
    <h2>Cadastrar Novo Veículo</h2>
    <form class="form" method="POST" action="{{ route('vehicles.store') }}">
        @csrf
        <label for="Nome">Nome:</label>
        <input type="text" name="name" id="name" required>
        <label for="Nome">Ano:</label>
        <input type="number" name="year" id="year" required>
        <label for="Nome">Cor:</label>
        <input type="text" name="color" id="color" required>
        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
    </form>
@endsection