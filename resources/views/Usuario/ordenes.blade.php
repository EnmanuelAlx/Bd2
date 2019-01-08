@extends('layouts.menu') 
@section('content')

<div class="card">
    <div class="card-header">
        Ordenes
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>
                        Fecha de creacion
                    </th>
                    <th>
                        Cantidad de productos
                    </th>
                    <th>Fecha de Envio</th>
                    <th>Fecha de Entrega</th>
                    <th>
                        Estatus
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ordenes as $orden)
                    <tr >
                        <td>
                            {{ $orden->created_at }}
                        </td>
                        <td>
                            {{ $orden->productos->count() }}
                        </td>
                        <td>
                            {{ $orden->fecha_envio }}
                        </td>
                        <td>
                            {{ $orden->fecha_entrega }}
                        </td>
                        <td>
                            @if ($orden->status == 0)
                                <span style="color: darkgoldenrod">Pendiente por validar</span>
                            @elseif($orden->status==1)
                                <span style="color: mediumblue">En proceso</span>
                            @else
                                <span style="color: green">Recibido</span>
                            @endif
                        </td>
                        <td>
                            
                            <button data-id="{{ $orden->id }}" 
                                data-toggle="modal"
                                data-target="#exampleModal"
                                class="btn btn-dark btn-ver">
                                Ver
                            </button>

                            @if ($orden->status == 1)
                                <form action="{{ route('marcarRecibido', $orden->id) }}">
                                    <button class="btn btn-success">Marcar recibido</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Productos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">
                <table class="table" id="tabla">
                    
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


@endsection

@section('scripts')
    
    <script>
        function getProductos(id) {
            $.ajax({
            type: 'GET',
            url: "{{ route('getProductos') }}",
            dataType: 'JSON',
            data: {id},
            success: function (data) {
                $('#tabla').html(data)
            },
            error: function (data) {
                console.log('hey');
                console.log(data);
            }
        });
        }


        $(document).ready(function(){

            $('.btn-ver').click(function() {
                let id = $(this).data().id;
                getProductos(id);
            });


        });
    </script>

@endsection