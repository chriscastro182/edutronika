@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="btn-group btn-group-sm">
                <a href="{{ route('productos.index') }}">
                    <button type="button" class="btn btn-default"><b><i class="fa fa-angle-left fa-2x"></i></b> Volver <span class="badge badge-primary"></span></button>
                </a>           
            </div>
        </div>
        <div class="col-md-6">
            <div class="product">                
                {!! Form::model($Producto, ['route' => ['productos.update', $Producto->id],
                'method' => 'PUT', 'files' => true]) !!}

                    @include('productos.partials.formU')
                    
                {!! Form::close() !!}
            </div>
        </div>

    </div>
</div>
<script src="{{ asset('js/jquery.min.js') }}">		</script>

<script>
    $(document).ready(function() {
        $('#deleteImg').click( function(e){
            e.preventDefault();
            alert('Imagen borrada, seleccione otra o vaya atras para conservar la imagen eliminada');
            $('#imageHidden').remove();
            $('#deleteImg').hide('fast');
            $('#imageShowed').hide('slow');
            $('#noImageShowed').show('slow');
            $('#newImage').show('fast');
        });
    });
</script>
@endsection