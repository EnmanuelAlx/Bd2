@extends('layouts.menu') 
@section('content')
<hr>
<div class="">
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
            </div>
        </div>
        <div class="card-footer">

        </div>
    </div>
</div>
@endsection