<thead>
    <tr>
        <th>
            Producto
        </th>
        <th>
            Adicional
        </th>
        <th>
            Precio Unitario
        </th>
        <th>
            Cantidad
        </th>
        <th>
            Total
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