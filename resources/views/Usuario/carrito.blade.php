@extends('layouts.menu') 
@section('content')

    <div class="card">
        <div class="card-header">
            Carrito
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            Producto
                        </th>
                        <th>
                            Adicional
                        </th>
                        <th class="text-right">
                            Total Unitario
                        </th>
                        <th class="text-right">
                            Cantidad
                        </th>
                        <th class="text-right">
                            Total
                        </th>
                        <th>
                            
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productos as $producto)
                        @foreach ($producto as $p)
                        <tr class="r2d2" data-id="{{ $p->id }}" data-orden="{{ $p->id_orden }}">
                            <td>
                                <span>{{ App\Producto::find($p->id_producto)->descripcion }}</span>
                            </td>
                            <td>
                                @if ($p->id_adicional)
                                    <span>{{ App\Adicional::find($p->id_adicional)->descripcion }}</span> 
                                @endif
                            </td>
                            <td class="text-right">
                                @if ($p->id_adicional)
                                    <span>
                                        {{ (App\Producto::find($p->id_producto)->precio + App\Adicional::find($p->id_adicional)->precio)}}
                                    </span> 
                                @else
                                    <span>
                                        {{ App\Producto::find($p->id_producto)->precio }}
                                    </span> 
                                @endif
                            </td>
                            <td class="text-right">
                                <span>{{ $p->cantidad }}</span>
                            </td>
                            <td class="text-right">
                                @if ($p->id_adicional)
                                    <span>{{ (App\Producto::find($p->id_producto)->precio + App\Adicional::find($p->id_adicional)->precio) * $p->cantidad}}</span>        @else
                                    <span>{{ App\Producto::find($p->id_producto)->precio * $p->cantidad }}</span> 
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-danger sacarCarrito">Sacar</button>
                            </td>
                        </tr>
                        @endforeach  
                    @empty
                        <h1>No posee productos en el carrito</h1>
                    @endforelse
                </tbody>
                <tfoot>
                    @if (sizeof($productos)>0)
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Subtotal: </td>
                            <td class="text-right">{{ $total }}$</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Porcentaje de la pagina: </td>
                            <td class="text-right">10%</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Total: </td>
                            <td class="text-right">{{ $total * 1.10}}$</td>
                            <td></td>
                        </tr>
                    @endempty
                </tfoot>
            </table>
            
            <div class="actions">
                @if (sizeof($productos)>0)
                    <button class="btn btn-primary ejecutarOrden">Ejecutar Orden</button>                    
                @else
                    <a href="{{ route('visualizarOrdenes') }}" class="btn btn-primary hidden">Visualizar Ordenes</a
                @endif
            </div>
            
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('js/notification.min.js') }}"></script>
    <script>

    function ejecutarOrden(id) {
        $.ajax({
            type: 'GET',
            url: "{{ route('finalizarOrden') }}",
            dataType: 'JSON',
            data: {id},
            success: function (data) {
                console.log('success' + data);
                if(data == 1){
                    var button = `<a href="{{ route('visualizarOrdenes') }}" class="btn btn-primary hidden">Visualizar Ordenes</a>`;
                    $.bootstrapGrowl("La orden finalizo correctamente", { type: 'success' });
                    $('.ejecutarOrden').remove();
                    $('.actions').html(button);
                }else{
                    $.bootstrapGrowl("Ha ocurrido un error", {type: 'danger'});
                }      
            },
            error: function (data) {
                console.log('HEEEEEEEEEEEY ERROR');
                $.bootstrapGrowl("Ha ocurrido un error", {type: 'danger'});                      
            }
        });
    }

    function sacarCarrito(id, row) {
        $.ajax({
            type: 'GET',
            url: "{{ route('deleteCarrito') }}",
            dataType: 'JSON',
            data: {id},
            success: function (data) {
                row.remove();

            },
            error: function (data) {
                console.log('error');
            }
        });
    }
     $(document).ready(function(){
        var id = 0;
        $('.sacarCarrito').click(function(){
            id = $(this).parents('tr').data().id
            sacarCarrito($(this).parents('tr').data().id, $(this).parents('tr'));
        });

        $('.ejecutarOrden').click(function(){
            let id = ($('.r2d2').data().orden);
            ejecutarOrden(id);
        });


     });
    </script>
@endsection