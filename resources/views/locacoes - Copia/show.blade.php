@extends('layouts.app')

@section('content')
    <h1>Detalhes da Locação</h1>
    <p><strong>Cliente:</strong> {{ $locacao->cliente->nome }}</p>
    <p><strong>Carro:</strong> {{ $locacao->carro->modelo }}</p>
    <p><strong>Data de Início:</strong> {{ $locacao->data_inicio }}</p>
    <p><strong>Data de Fim:</strong> {{ $locacao->data_fim }}</p>
    <a href="{{ route('locacoes.index') }}">Voltar</a>
@endsection
``` ### 5. Configuração do Layout

Para que as views funcionem corretamente, você também precisará de um layout base. Crie um arquivo chamado `app.blade.php` em `resources/views/layouts`:

#### `resources/views/layouts/app.blade.php`

```blade
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Projeto</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>