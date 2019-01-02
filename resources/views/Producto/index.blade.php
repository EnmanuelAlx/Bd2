@extends('layouts.menu') 
@section('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
@endsection
@section('content')
    @if ($errors->any())
        <h4>{{ $errors->first() }}</h4>
    @endif
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

@endsection

@section('scripts')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
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
        });
    </script>
@endsection