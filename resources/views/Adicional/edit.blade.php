@extends('layouts.menu') 
@section('content')

@if (Session::has('info'))
<div class="alert alert-success">
    {{ Session::get('info') }}
</div>
@endif
<div class="card">
    <div class="card-header">
        <a href="{{ route('productos.index') }}" class="btn btn-success">Cha pa tras prro</a>
        {{ $adicional->descripcion }}
    </div>
    <div class="card-body">
        <form action="{{ route('updateAdicional', $adicional->id) }}" method="POST")>
            @method('PUT') @csrf
            <div class="from-group">
                <label for="descripcion">Descripcion</label>
                <input type="text" class="form-control" name="descripcion" value="{{ $adicional->descripcion }}">
            </div>
            <div class="from-group">
                <label for="precio">Precio</label>
                <input type="text" class="form-control" name="precio" value="{{ $adicional->precio }}">
            </div>
            <div>
                <button class="btn btn-primary">Editar</button>
            </div>
        </form>
        <form action="{{ route('borrarAdicional', $adicional->id) }}" method="post">
            @method("delete") @csrf
            <button class="btn btn-danger">Borrar</button>
        </form>
    </div>
</div>

@endsection