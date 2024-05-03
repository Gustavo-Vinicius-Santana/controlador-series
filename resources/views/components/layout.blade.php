<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            background-color: #f8f9fa; /* Tom mais cinza */
        }
    </style>
</head>
<body>
    <header class="bg-dark text-white mb-3">
        <div class="container">
            <h1 class="text-center">CONTROLE DE SERIES</h1>
            <nav class="navbar navbar-expand-lg navbar-dark justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item me-3 fs-5">
                        <a class="nav-link" href="/">Início</a>
                    </li>
                    <li class="nav-item me-3 fs-5">
                        <a class="nav-link" href="/series">Listar series</a>
                    </li>
                    <li class="nav-item me-3 fs-5">
                        <a class="nav-link" href="{{ route('series.create') }}">Cadastrar series</a>
                    </li>
                    <li class="nav-item me-3 fs-5">
                        <a class="nav-link" href="{{ route('users.index') }}">Usuario</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <h2 class="text-center">{{ $title }}</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @isset($mensagemSucesso)
            @if($mensagemSucesso != null)
                <div class="alert alert-success">
                    {{ $mensagemSucesso }}
                </div>
            @endif
        @endisset

        {{ $slot }}
    </div>

</body>
</html>