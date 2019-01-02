@extends('layouts.menu') 
@section('content')

<div class="card" data-producto="{{ $producto->id }}">
    <div class="card-header text-center">
        {{ $producto->descripcion }}
    </div>
    <div class="card-body text-center">
        <div class="">
            <img src="{{ Storage::url($producto->imagen) }}" alt="{{ $producto->descripcion }}" 
            height="200" 
            width="200" 
            class="">
        </div>

        <div class="row">
            <h4 class="col">Adicionales <button class="btn btn-primary addAdicionales" data-toggle="modal" data-target="#modal">+</button></h4>
        </div>

        <table class="table table-active">
            <thead>
                <tr>
                    <th>Descripcion</th>
                    <th>Precio</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($producto->adicionales as $adicional)
                    <tr data-adicional="{{ $adicional->id }}">
                        <td>
                            {{ $adicional->descripcion }}
                        </td>
                        <td>
                            {{ $adicional->precio }}
                        </td>
                        <td>
                            <button class="btn btn-danger">Borrar</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">

    </div>
</div>


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Adicionales</h5>
                <button data-toggle="modal" data-target="#agregarAdicional" class="btn btn-success">Agregar adicional no existente</button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="adicionales">
                <form action="{{ route('addAdicional') }}" id="formAdd" method="post">
                    @csrf
                    <input type="hidden" name="producto" value="{{ $producto->id }}">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Descripcion</th>
                                <th>Precio</th>
                            </tr>
                        </thead>
                        <tbody id="adicionales">
                            @foreach (App\Adicional::AdicionalesNotProduct($producto) as $item)
                                <tr data-id="{{ $item->id }}">
                                    <td>
                                        <span>{{ $item->descripcion }}</span>                                    
                                    </td>
                                    <td>
                                        <span>{{ $item->precio }}</span>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="adicional[]" value="{{ $item->id }}">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary btn-add">Guardar</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="agregarAdicional" tabindex="-1" role="dialog" aria-labelledby="agregarAdicional" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo adicional</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('agregarAdicional') }}" method="POST" id="agregarNuevoAdicional">
                    @csrf
                    <div class="form-group">
                        <label for="descripcion" class="col-form-label">Descripcion:</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion">
                    </div>
                    <div class="form-group">
                        <label for="precio" class="col-form-label">Precio</label>
                        <input type="number" class="form-control" name="precio" id="precio" onkeyup="isInteger()">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary agregarNuevoAdicional">Agregar Adicional</button>
            </div>
        </div>
    </div>
</div>


@endsection
@section('scripts')
    <script>
        function isInteger(){
            if(($('#precio').val())<0){
                console.log('hey stan lee');
                $('#precio').css('border-color', 'red');
            }else{
                $('#precio').css('border-color', 'black');
            }
        }

        function deleteAdicional(producto, adicional, row){
            console.log(producto, adicional);
            $.ajax({
                type: 'GET',
                url: "{{ route('deleteAdicional') }}",
                dataType: 'JSON',
                data: {'producto':producto, 'adicional':adicional},
                success: function (data) {
                    row.remove();

                },
                error: function (data) {
                    console.log('error');
                }
            });
        }

        $(document).ready(function(){
            $('.btn-danger').click(function(){
                deleteAdicional($('.card').data().producto, $(this).parents('tr').data().adicional, $(this).parents('tr'));
            });

            $('.btn-add').click(function(){
                console.log('hey stan lee');
                $('#formAdd').submit();
            });

            $('.agregarNuevoAdicional').click(function(){
                $('#agregarNuevoAdicional').submit();
            });
                 
        });
    </script>
@endsection