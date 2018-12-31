@forelse ($productos as $producto)
    <div class="col col-3" style="margin-bottom: 6px">
        <div class="card text-center" style="width:15rem;">
            <div class="card-header">
                <span class="badge badge-dark">{{ $producto->descripcion }}</span>
            </div>
            <a class="text-center">
                    <img class="card-img-top" src="{{ Storage::url($producto->imagen) }}" alt="{{ $producto->descripcion }}" height="150" width="150" style="border-radius: 10%">
                </a>
            <div class="card-body">
                <span class="badge badge-info"><b>${{ $producto->precio }}</b></span>
                @auth
                    <span>Añadir al carrito</span>
                @endauth
            </div>
        </div>
    </div>
@empty
    <div class="text-center">
        <h2>Esta empresa no posee productos</h2>
    </div>
@endforelse