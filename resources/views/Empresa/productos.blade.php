@forelse ($productos as $producto)
    <div class="col col-3" style="margin-bottom: 6px" data-id="{{ $producto->id }}">
        <div class="card text-center" style="width:15rem;">
            <div class="card-header">
                <span class="badge badge-dark">{{ $producto->descripcion }}</span>
            </div>
            <a class="text-center">
                    <img class="card-img-top" src="{{ ($producto->imagen) }}" alt="{{ $producto->descripcion }}" height="150" width="150" style="border-radius: 10%">
                </a>
            <div class="card-body">
                <span class="badge badge-info"><b>${{ $producto->precio }}</b></span>
            </div>
            <div class="card-footer text-center">
                @if (sizeof($producto->adicionales)>0)
                    <span>Adicionales</span>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                @auth
                                    <th></th>
                                @endauth
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($producto->adicionales as $adicional)
                            <tr>
                                <td>{{ $adicional->descripcion }}</td>
                                <td>{{ $adicional->precio }}</td>
                                <td><input type="checkbox" name="adicionales" class="adicional" value="{{ $adicional->id }}"></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    No posee adicionales
                @endif
                @auth
                <button class="btn btn-primary add_card" data-id="{{ $producto->id }}">
                    Añadir al carrito
                </button> 
                @endauth
                
            </div>
        </div>
    </div>
@empty
    <div class="text-center">
        <h2>Esta empresa no posee productos</h2>
    </div>
@endforelse
@section('scripts')
<script src="{{ asset('js/notification.min.js') }}"></script>
    <script>
        function agregarACarrito(producto, adicionales) {
            let token = "{{ csrf_token() }}";
            $.ajax({
                type: "POST",
                data: { producto, adicionales, _token:token},
                url: "{{ route('agregarProductoCarrito') }}",
                dataType: 'JSON',
                success: function (data) {
                },
                error: function (data) {
                    if(data.statusText == 'OK'){
                        $.bootstrapGrowl("El producto se ha agregado al carrito", { type: 'success' });
                    }
                    else{
                        $.bootstrapGrowl("Ha ocurrido un error", {type: 'danger'});
                    }        
                }
            })
        }

        $(document).ready(function(){
            $('.add_card').click(function(){
                let id_producto = $(this).data().id
                let adicionales = [];
                $(this).parents('.card-footer').find('.adicional').each(function(i, o){
                    if($(o).prop('checked')){
                        adicionales.push($(o).val());
                    }
                });
                agregarACarrito(id_producto, adicionales)
            });
        });
    </script>
@endsection