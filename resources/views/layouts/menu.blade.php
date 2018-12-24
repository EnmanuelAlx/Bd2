<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
        crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>
    <title>Delivery Market</title>
</head>
<body>
<div class="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="col-5">
            Aqui va una imagen
        </div>
        <form class="form-inline my-2 my-lg-4 col-5">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        
    
        <div class="col" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    @auth
                        <a class="nav-link" href="#"> {{ Auth::user()->email }} <span class="sr-only">(current)</span></a>
                        <a href="#" class="nav-link"> Administrar </a>
                    @endauth
                    @guest
                        <a class="nav-link" href="#">Entrar</span></a>
                    @endguest
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#">Carrito</a>
                </li>
            </ul>
            
        </div>
    </nav>
    <hr>
    <div class="container-fluid">
        <div class="row">
            {{-- <div class="col active"> --}}
            @yield('categorias')
            {{-- </div> --}}
            
            @yield('content')
            
        </div>
    </div>
</div>
</body>
</html>