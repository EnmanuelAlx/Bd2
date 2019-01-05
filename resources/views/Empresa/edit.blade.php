@extends('layouts.menu') 
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ url('/') }}" class="btn btn-success">Cha pa tras prro</a>
            @if ($errors->any())
            <h4>{{ $errors->first() }}</h4>
            @endif @if (Session::has('info'))
            <div class="alert alert-success">
                {{ Session::get('info') }}
            </div>
            @endif
        </div>
    
        <div class="card-body">
            <img src="{{ $empresa->imagen }}" alt="">

            <form method="POST" action="{{ route('updateEmpresa', $empresa->id) }}" enctype="multipart/form-data">
                @method('PUT') @csrf
    
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="name" id="nombre" class="form-control" value="{{ $empresa->name }}">
                </div>
    
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $empresa->telefono }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" class="form-control" value="{{ $empresa->email }}">
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" value="">
                </div>
                <div class="form-group">
                    <label for="password-confirm">Confirmar Contraseña</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
                </div>

                <div class="form-group">
                    <label for="imagen">Imagen</label>
                    <input type="file" id="imagen" name="imagen" class="form-control">
                </div>
                
                
                <div class="form-group">
                    <label for="">Categoria</label>
                    @foreach ($categorias as $categoria)
                        @if ($categoria->id == $empresa->id_categoria)
                            <div class="form-check">
                                <input type="radio" id="id_categoria{{ $categoria->id }}" name="id_categoria" class="form-check-input" value="{{ $categoria->id }}" checked>
                                <label for="id_categoria{{ $categoria->id }}" class="form-check-label">{{ $categoria->descripcion }}</label>
                            </div>
                        @else
                            <div class="form-check">
                                <input type="radio" id="id_categoria{{ $categoria->id }}" name="id_categoria" class="form-check-input" value="{{ $categoria->id }}">
                                <label for="id_categoria{{ $categoria->id }}" class="form-check-label">{{ $categoria->descripcion }}</label>
                            </div>
                        @endif
                    @endforeach
                </div>
                <button class="btn btn-primary">Editar</button>
            </form>
        </div>
        <div class="card-footer">
    
        </div>
    </div>
@endsection