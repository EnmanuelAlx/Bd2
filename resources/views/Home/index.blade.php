@extends('layouts.menu')
@section('categorias')
    <div class="col">
        <div class="list-group">
            <a href="/" class="list-group-item list-group-item-action" ">Todas</a>
                @foreach ($categorias as $categoria)
                <a href="#" onclick="getInfo({{ $categoria->id }})" class="list-group-item list-group-item-action" id="{{
            $categoria->id }}"">{{ $categoria->descripcion }}</a>
            @endforeach
        </div>
    </div>
@endsection

@section('content')
    <div class="card col-10" id="panelEmpresas">
        <div class="card-body">
            <div class="row justify-content-md-center">
                @include('Home.empresas', $empresas)
            </div>
        </div>
        <div class="card-footer">
            <div class="row justify-content-md-center">
                {{ $empresas->links() }}
            </div>
        </div>
    </div>

@endsection
