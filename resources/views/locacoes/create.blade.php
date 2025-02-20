@extends('layouts.app')

@section('content')
    <h1>Cadastrar Locação</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('locacoes.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="carro_id">Carro:</label>
            <select name="carro_id" id="carro_id" class="form-control" required>
                <option value="">Selecione um carro</option>
                @foreach($carros as $carro)
                    <option value="{{ $carro->id }}" data-preco="{{ $carro->preco_diaria }}" 
                        {{ isset($carroSelecionado) && $carroSelecionado->id == $carro->id ? 'selected' : '' }}>
                        {{ $carro->modelo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="cliente_id">Cliente:</label>
            <select name="cliente_id" id="cliente_id" class="form-control" required>
                <option value="">Selecione um cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="data_inicio">Data de Início:</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="data_fim">Data de Fim:</label>
            <input type="date" name="data_fim" id="data_fim" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="valor_pago">Valor Total:</label>
            <input type="number" name="valor_pago" id="valor_pago" class="form-control" step="0.01" required>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const carroSelect = document.getElementById('carro_id');
            const dataInicio = document.getElementById('data_inicio');
            const dataFim = document.getElementById('data_fim');
            const valorPago = document.getElementById('valor_pago');

            function calcularValor() {
                const carroOption = carroSelect.options[carroSelect.selectedIndex];
                const precoDiaria = carroOption ? parseFloat(carroOption.getAttribute('data-preco')) : 0;

                const inicio = new Date(dataInicio.value);
                const fim = new Date(dataFim.value);
                const dias = (fim - inicio) / (1000 * 60 * 60 * 24);

                if (dias > 0) {
                    const total = precoDiaria * dias;
                    valorPago.value = total.toFixed(2);
                } else {
                    valorPago.value = '';
                }
            }

            carroSelect.addEventListener('change', calcularValor);
            dataInicio.addEventListener('change', calcularValor);
            dataFim.addEventListener('change', calcularValor);
        });
    </script>
@endsection