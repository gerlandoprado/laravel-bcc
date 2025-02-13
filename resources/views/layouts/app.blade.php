<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Projeto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        * {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark p-0 mb-5" style="background-color: #FF7700;">
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
        .search-box {
            width: 100%;
            max-width: 500px;
            margin: 10px auto;
            position: relative;
        }
        .search-button {
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
        }
        .search-button .fa-search {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #6c757d;
        }
        .nav-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }
    </style>
        <div class="container">
            <div class="d-flex justify-content-between align-items-center w-100">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('images/logo.png') }}" alt="Carluguel" height="70">
                </a>
                <div class="nav-container flex-grow-1 mx-4">
                    <div class="search-box">
                        <input type="text" class="form-control" placeholder="Pesquisar...">
                        <button type="button" class="search-button">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
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
                <a href="/login" class="btn btn-light">Entrar/Registrar</a>
            </div>
        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        @yield('content')
    </div>

    <footer class="mt-5 py-3" style="background-color: #f8f9fa;">
        <div class="container text-center">
            <p class="mb-0">Criado por Gerlando e Vitor utilizando Laravel</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>