@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="btn-group btn-group-sm">
                <a href="{{ route('productos.index') }}">
                    <button type="button" class="btn btn-default"><b><i class="fa fa-angle-left fa-2x"></i></b> Volver <span class="badge badge-primary"></span></button>
                </a>
                <a href="{{ route('productos.edit', $product->id) }}">
                    <button type="button" class="btn btn-warning"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i> Editar</button>
                </a>
                <a href="{{ route('productos.destroy', $product->id) }}">
                    <button type="button" class="btn btn-danger"><i class="fa fa-trash fa-2x" aria-hidden="true"></i> Eliminar</button>
                </a>                
            </div>
        </div>
        <div class="col-md-6">
            <div class="product">
                <div class="product-img">
                    <img src="{{ asset($product->image) }}" class=" push-right" alt="{{ $product->nombre }}" width="304" height="236"> 
                    <div class="product-label">
                        <span class="new">
                            <strong>Categoria: </strong> 
                            {{ $product->categoria->nombre}}
                        </span>
                    </div>
                </div>
                <br>
                <div class="product-body">
                    <p><strong>Nombre:</strong>      {{ $product->nombre }}      </p>
                    <p><strong>precio:</strong>      {{ $precio }}               </p>
                    <p><strong>stock:</strong>       {{ $product->stock }} pz    </p>
                    <p><strong>promedio:</strong>    {{ $product->promedio }}    </p>
                    <p><strong>Descripción:</strong> {{ $product->description }} </p>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection


