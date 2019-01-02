@extends('layouts.menu') 
@section('categorias')
<div class="col">
    <div class="list-group">
        <a href="{{ url('productos') }}" class="list-group-item list-group-item-action" ">Añadir Producto</a>
        <a href="/" class="list-group-item list-group-item-action" ">Añadir Adicional</a>
        {{-- <a href="/" class="list-group-item list-group-item-action" ">Actualizar informacion</a>         --}}
    </div>
</div>
@endsection
@section('content')
<hr>
<div class="col-10">
    <div class="card">
        <div class="card-header text-center">
            <h1>{{ Auth::guard('empresa')->user()->name }}</h1>
        </div>
        <div class="card-body">
            <div class="row text-center">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Productos
                        </div>
                        <div class="card-body">
                            <a href="{{ url('productos') }}">
                                <img src="{{ asset('imagenes/productos.jpg') }}" height="163" width="200">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Adicionales
                        </div>
                        <div class="card-body">
                            <a href="#">
                                <h2>Aqui deberia ir una imagen para adicionales pero me dio flojera buscar</h2>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            Adicionales en Productos
                        </div>
                        <div class="card-body">
                            <a href="#">
                                <h2>Aqui deberia ir una imagen para lo que sea esto pero no supe que poner</h2>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
</div>
@endsection