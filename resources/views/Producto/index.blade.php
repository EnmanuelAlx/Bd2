@extends('layouts.menu') 
@section('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    <div class="row">
        <div class="col">
            @if ($errors->any())
                <h4>{{ $errors->first() }}</h4>
            @endif
        </div>

        <div class="col">
            <button class="btn btn-primary" data-toggle="modal" data-target="#agregarProducto">Agregar Producto</button>
        </div>
    </div>
    <table class="table table-striped table-bordered" id="productos">
        <thead>
            <tr>
                <th>Descripcion</th>
                <th>Precio</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>



<div class="modal fade" id="agregarProducto" tabindex="-1" role="dialog" aria-labelledby="agregarProducto" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('productos') }}" method="POST" id="agregarNuevoProducto" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="descripcion" class="col-form-label">Descripcion:</label>
                        <input type="text" class="form-control" name="descripcion" id="descripcion">
                    </div>
                    <div class="form-group">
                        <label for="precio" class="col-form-label">Precio</label>
                        <input type="number" class="form-control" name="precio" id="precio" onkeyup="isInteger()">
                    </div>
                    <div class="form-group">
                        <label for="imagen" class="col-form-label">Imagen</label>
                        <input type="file" class="form-control" name="imagen" id="imagen">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary agregarProducto">Agregar Poducto</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>

        function isInteger(){
            if(($('#precio').val())<0){
                console.log('hey stan lee');
                $('#precio').css('border-color', 'red');
            }else{
                $('#precio').css('border-color', 'black');
            }
        }

        $(document).ready(function(){
            const id_empresa = {{ Auth::guard('empresa')->user()->id }};
            var table = $('#productos').DataTable({
                'serverSide':true,
                "ajax":`{{ url('api/productos/${id_empresa}') }}`,
                "columns": [
                    {data: 'descripcion'},
                    {data: 'precio'},
                ],
            });

            $('#productos tbody').on( 'click', 'tr', function () {
                var data = table.row( $(this) ).data();
                console.log(data);
                $(location).attr('href', `{{ url('productos/${data.id}') }}`);
            });

            $('.agregarProducto').click(function(){
                $('#agregarNuevoProducto').submit();
            });
        });
    </script>
@endsection