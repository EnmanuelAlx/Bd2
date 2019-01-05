@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row direccion">
                            <label for="direccion" class="col-md-4 col-form-label text-md-right">Direccion</label>
                            <div class="col-md-6">
                                <input type="text" id="direccion" name="direccion" class="form-control" value="{{ old('direccion') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="telefono" class="col-md-4 col-form-label text-md-right">Telefono</label>
                            <div class="col-md-6">
                                <input type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="empresa" class="col-md-4 col-form-label text-md-right">Es Empresa</label>
                            <div class="col-md-6">
                                <input id="empresa" type="checkbox" class="form-control empresa" name="empresa">
                            </div>
                        </div>

                        <div class="form-group row inputs-empresa">
                        
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>

    function htmlDireccion(){
        return `
            <label for="direccion" class="col-md-4 col-form-label text-md-right">Direccion</label>
            <div class="col-md-6">
                <input type="text" id="direccion" name="direccion" class="form-control" value="{{ old('direccion') }}">
            </div>
        `
    }

    
    function htmlEmpresa(){
        return `
            <div>
                <label for="imagen" class="col-md-4 col-form-label text-md-right">Imagen</label>
                <div class="col-md-6">
                    <input type="file" id="imagen" name="imagen" class="form-control">
                </div>
            </div>
            <div>
                Categoria
                @foreach (App\Categoria::all() as $categoria)
                <div class="form-check">
                    <input type="radio" id="id_categoria{{ $categoria->id }}" name="id_categoria" class="form-check-input" value="{{ $categoria->id }}"
                        checked>
                    <label for="id_categoria{{ $categoria->id }}" class="form-check-label">{{ $categoria->descripcion }}</label>
                </div>
                @endforeach
            </div>
        `
    }

    $(document).ready(function(){
        const routeEmpresa = '{{ route('registerEmpresa') }}'
        const routeUsuario = '{{ route('register') }}'
        $('#empresa').click(function(){
            if($(this).prop('checked')){
                $('.inputs-empresa').html(htmlEmpresa());
                $('.direccion').html("");
                $('form').attr('action', routeEmpresa)
                $('form').attr('enctype', 'multipart/form-data')
            }
            else{
                $('.inputs-empresa').html("");
                $('.direccion').html(htmlDireccion());
                $('form').attr('action', routeUsuario);
                $('form').removeAttr('enctype')
            }
        });
        
    });
</script>
@endsection
