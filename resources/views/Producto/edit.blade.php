@extends('layouts.menu') 
@section('content')
    

    <div class="card">
        <div class="card-header">
            <a href="{{ url('productos', $producto->id) }}" class="btn btn-success">Cha pa tras prro</a>
            @if ($errors->any())
                <h4>{{ $errors->first() }}</h4>
            @endif
            @if (Session::has('info'))
                <div class="alert alert-success">
                    {{ Session::get('info') }}
                </div>
            @endif
        </div>

        <div class="card-body">
            
            <img src="{{ $producto->imagen }}" alt="{{ $producto->descripcion }}" height="200" width="200" class="">

            <form method="POST" action="{{ route('productos.update', $producto->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" id="descripcion" name="descripcion" class="form-control" value="{{ $producto->descripcion }}">
                </div>

                <div class="form-group">
                    <label for="precio">Precio</label>
                    <input type="number" id="precio" name="precio" class="form-control" value="{{ $producto->precio }}">
                </div>

                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" id="imagen" name="imagen" class="form-control">
                </div>
                <button class="btn btn-primary">Editar</button>
            </form>
        </div>
        <div class="card-footer">

        </div>
    </div>


@endsection