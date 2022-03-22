<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concessionária - Motos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body style="min-width: 372px">
    <div class="d-flex flex-column wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom shadow-sm mb-3">
            <div class="container">
                <b class="navbar-brand">Concessionária</b>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target=".navbar-collapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav flex-grow-1">
                        <li class="nav-item">
                            <button type="button" class="btn bg-dark text-decoration-none text-white p-0 px-2"> <a
                                    class="nav-link text-white" href="/carros">Carros</a></button>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn bg-dark text-decoration-none text-white p-0 px-2"><a
                                    class="nav-link text-white" href="/motos">Motos</a></button>
                        </li>
                    </ul>
                    <div class="align-self-end">
                        <div class="dropdown">
                            <button class="btn btn-secondary bg-dark dropdown-toggle" type="button"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton1">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout')}}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Sair') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </nav>
        <div class="container">
            @yield('content')
        </div>
    </body>
    </html>