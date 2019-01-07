@extends('layouts.menu')
@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{ route('/') }}" class="btn btn-success">Cha pa tras prro</a>
        @if ($errors->any())
        <h4>{{ $errors->first() }}</h4>
        @endif @if (Session::has('info'))
        <div class="alert alert-success">
            {{ Session::get('info') }}
        </div>
        @endif
    </div>
    <div class="card-body">
        <form action="{{ route('updateUser', $usuario->id) }}" method="POST">
            @method('PUT') @csrf
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $usuario->name }}">
            </div>

            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" id="direccion" class="form-control" value="{{ $usuario->direccion }}">
            </div>

            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $usuario->telefono }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" class="form-control" value="{{ $usuario->email }}">
            </div>
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="password" name="password" id="password" class="form-control" value="">
            </div>
            <div class="form-group">
                <label for="password-confirm">Confirmar Contraseña</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>
            <button class="btn btn-primary">Actualizar</button>
        </form>
    </div>
    <div class="card-footer">

    </div>
</div>

@endsection