
@forelse ($empresas as $empresa)
    <div class="col col-3">
        <div class="card text-center" style="width:15rem;">
            <div class="card-header">
                {{ $empresa->name }}
            </div>
            <a class="text-center" href="{{ route('productosEmpresa', $empresa->id) }}">
                <img class="card-img-top" src="{{($empresa->imagen) }}" alt="{{ $empresa->name }}" height="150" width="150" style="border-radius: 10%">
            </a>
            <div class="card-body">
                <span>{{ $empresa->telefono }}</span>
                <span>{{ $empresa->email }}</span>
            </div>
        </div>
    </div>
@empty
<h1>No hay empresas! se la primera en registrarte</h1>    
@endforelse