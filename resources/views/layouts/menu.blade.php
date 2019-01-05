<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
        
    <title>{{ config('app.name', 'Laravel') }}</title>
    @yield('links')
</head>
<body>
<div class="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="col-4">
            <a href="/">
                <img src="{{ asset('imagenes/shoping.png') }}" height="80" width="200">
            </a>
        </div>
        <form class="form-inline my-2 my-lg-4 col-5">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        
        <div class="col" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

                
                @if (empty(!Auth::guard('empresa')->user()))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                                                Opciones
                                            </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a href="{{ route('administrarEmpresa') }}" class="btn btn-xs">Administrar {{ Auth::guard('empresa')->user()->name }}</a>
                            <a href="{{ route('editEmpresa', Auth::guard('empresa')->user()->id)}}" class="btn btn-xs">Actualizar informacion</a>
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="btn btn-xs btn-block">Cerrar Sesion</button>
                            </form>
                        </div
                    </li>
                @elseif(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                                                                                                              Opciones
                                                                                                            </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <button class="btn btn-danger btn-xs">Cerrar Sesion</button>
                            </form>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Carrito</a>
                    </li>
                @endif
        

                @if(!Auth::check())
                    @guest('empresa')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('login') }}">Entrar</span></a>
                        </li>    
                    @endguest
                @endif
                        
            </ul>
            
        </div>
    </nav>
    <hr>
    <div class="container-fluid">
        <div class="row">
            {{-- <div class="col active"> --}}
            @yield('categorias')
            {{-- </div> --}}
            
            <div class="container">
                @section('content')
            </div>
            
            @show
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
@yield('scripts')
<script src="{{ asset('js/functions.js') }}"></script>
</body>
</html>