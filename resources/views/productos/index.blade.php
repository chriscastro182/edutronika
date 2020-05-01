
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Productos</title>
</head>
<body>
    <div class="container">
        <div class="row jumbotron">
            <div class="col-md-2">
                <a href="/">
                    <button type="button" class="btn btn-primary">Volver al inicio</button>
                </a>
            </div>
            <div class="col-md-10">
                <h2>Gestion de productos</h2>
            </div>
        </div>
        <hr>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-10 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Productos
                        @can('productos.create')
                        <a href="{{ route('productos.create') }}" 
                        class="btn btn-sm btn-primary float-right">
                            <h3>+</h3> Crear
                        </a>
                        @endcan
                    </div>
    
                    <div class="panel-body">
                        <table id="productos" class="table table-striped table-bordered" style="width:100%" >
                            <thead>
                                <tr>
                                    <th width="10px">ID</th>
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productos as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->nombre }}</td>
                                    <td>{{ $product->precio }}</td>
                                    @can('productos.show')
                                    <td width="10px">
                                        <a href="{{ route('productos.show', $product->id) }}" 
                                        class="btn btn-sm btn-default">
                                            ver
                                        </a>
                                    </td>
                                    @endcan
                                    @can('productos.edit')
                                    <td width="10px">
                                        <a href="{{ route('productos.edit', $product->id) }}" 
                                        class="btn btn-sm btn-default">
                                            editar
                                        </a>
                                    </td>
                                    @endcan
                                    @can('productos.destroy')
                                    <td width="10px">
                                        {!! Form::open(['route' => ['productos.destroy', $product->id], 
                                        'method' => 'DELETE']) !!}
                                            <button class="btn btn-sm btn-danger">
                                                Eliminar
                                            </button>
                                        {!! Form::close() !!}
                                    </td>
                                    @endcan
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- scripts --}}
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#productos').DataTable();
        } );
    </script>
</body>
</html>