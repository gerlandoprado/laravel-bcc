<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Projeto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark mb-4 p-0" style="background-color: #FF7700;">
    <style>
        .navbar-nav .nav-link {
            color: #ffffff !important;
            font-weight: 500;
            margin: 0 15px;
            padding-bottom: 2px;
            border-bottom: 3px solid transparent;
            transition: border-color 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            color: #ffffff !important;
            border-bottom: 3px solid #003a68;
        }
    </style>
        <div class="container">
            <a class="navbar-brand" href="/" style="margin-right: auto;">Carluguel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link p-3" href="/carros">Carros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-3" href="/locacoes">Locações</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-3" href="/clientes">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link p-3" href="/custos">Custos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>