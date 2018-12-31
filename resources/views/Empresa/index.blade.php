@extends('layouts.menu') 
@section('content')
<div>
<div class="card text-center">
    <div class="card-header">
        <div class="row">
            <a class="btn btn-danger" href="{{ url('/') }}" style="margin-right: 6cm"> Echa pa tras prro</a>
            <h3>Empresa: {{ $empresa->name }}</h3>
        </div>
    </div>
    <div class="card-body">
            <div class="row">
                @include('Empresa.productos', $productos)
            </div>
    </div>

    <div class="card-footer">
        {{ $productos->links() }}
    </div>
</div>
</div>
@endsection