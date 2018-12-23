@extends('layouts.menu')
@section('content')
    <div class="row justify-content-md-center">
        @include('Home.empresas', $empresas)
    </div>
    <div class="row justify-content-md-center">
        {{ $empresas->links() }}
    </div>
@endsection