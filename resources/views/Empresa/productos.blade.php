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
            <div class="card-footer text-center">
                @if (sizeof($producto->adicionales)>0)
                    <span>Adicionales</span>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Descripcion</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($producto->adicionales as $adicional)
                            <tr>
                                <td>{{ $adicional->descripcion }}</td>
                                <td>{{ $adicional->precio }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    No posee adicionales
                @endif
                
                
            </div>
        </div>
    </div>
@empty
    <div class="text-center">
        <h2>Esta empresa no posee productos</h2>
    </div>
@endforelse