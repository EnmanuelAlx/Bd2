@extends('layouts.menu') 
@section('content')
<hr>
<div class="col-12">

    <div class="card">
        <div class="card-header row">
            <div class="col-4">
                <a class="btn btn-danger" href="{{ url('/') }}"> Echa pa tras prro</a>
            </div>
            <div class="col-8">
                <h3>Empresa: {{ $empresa->nombre }}</h3>
            </div>
        </div>
        <div class="card-body row justify-content-md-center">
             @include('Empresa.productos', $productos)
        </div>

        <div class="card-footer row justify-content-md-center">
            {{ $productos->links() }}
        </div>
    </div>
@endsection