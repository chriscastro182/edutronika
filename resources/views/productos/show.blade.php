@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="btn-group btn-group-sm">
                <a href="{{ route('productos.index') }}">
                    <button type="button" class="btn btn-default"><b><i class="fa fa-angle-left fa-2x"></i></b> Volver <span class="badge badge-primary"></span></button>
                </a>
                <a href="{{ route('productos.edit', $Producto->id) }}">
                    <button type="button" class="btn btn-warning"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i> Editar</button>
                </a>
                <a href="{{ route('productos.destroy', $Producto->id) }}">
                    <button type="button" class="btn btn-danger"><i class="fa fa-trash fa-2x" aria-hidden="true"></i> Eliminar</button>
                </a>                
            </div>
        </div>
        <div class="col-md-6">
            <div class="producto">
                <div class="producto-img">
                    <img src="{{ asset($Producto->image) }}" class=" push-right" alt="{{ $Producto->nombre }}" width="304" height="236"> 
                    <div class="producto-label">
                        <span class="new">
                            <strong>Categoria: </strong> 
                            {{ $Producto->categoria->nombre}}
                        </span>
                    </div>
                </div>
                <br>
                <div class="producto-body">
                    <p><strong>Nombre:</strong>      {{ $Producto->nombre }}      </p>
                    <p><strong>precio:</strong>      {{ $precio }}               </p>
                    <p><strong>stock:</strong>       {{ $Producto->stock }} pz    </p>
                    <p><strong>promedio:</strong>    {{ $Producto->promedio }}    </p>
                    <p><strong>Descripción:</strong> {{ $Producto->description }} </p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection


