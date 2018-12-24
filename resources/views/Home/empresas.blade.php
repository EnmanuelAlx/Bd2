
@foreach ($empresas as $empresa)
    <div class="col col-3">
        <div class="card text-center" style="width:15rem;">
            <div class="card-header">
                {{ $empresa->nombre }}
            </div>
            <a class="text-center" href="{{ url('Empresa', $empresa->id) }}">
                <img class="card-img-top" src="https://picsum.photos/200/200" alt="{{ $empresa->nombre }}" height="150" width="150" style="border-radius: 10%">
            </a>
            <div class="card-body">
                <span>{{ $empresa->telefono }}</span>
                <span>{{ $empresa->email }}</span>
            </div>
        </div>
    </div>
@endforeach

