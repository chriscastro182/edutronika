{{-- Hidden Ids & attributes for complete model binding --}}
<input type="hidden" value="{{ $Producto->id }}" name="id">
<input type="hidden" value="{{ $Producto->vendidos }}" name="vendidos">
<input type="hidden" id="imageHidden" value="{{ $Producto->image }}" name="image">
{{-- Inputs filled by user --}}
<div class="product-img">
	@if ($Producto->image)
	<button id="deleteImg">
		x
	</button>
		<img id="imageShowed" src="{{ asset($Producto->image) }}" alt="{{ $Producto->nombre }}" width="304" height="236">
		<img id="noImageShowed" hidden src="{{ asset('img/carga.png') }}" alt="{{ $Producto->nombre }}" width="304" height="236">
		<div id="newImage" name="image" hidden>
			{{ Form::label('image', 'Imagen') }}
			{{ Form::file('image', null, ['class' => 'form-control']) }}
		</div>
		
	@else
		{{ Form::label('image', 'Imagen') }}
		{{ Form::file('image', null, ['class' => 'form-control']) }}
	@endif
 
	<div class="product-label">
		<span for="categoria_id" class="new push-right">Categoria: </span>
		<select name="categoria_id" id="" class="form-control form-control-lg">
			@forelse ($categorias as $categoria)
				@if ($Producto->categoria->id == $categoria->id)
					<option value="{{ $categoria->id }}" selected>{{ $categoria->nombre }}</option>
				@else
					<option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
				@endif
			@empty
				<option value="" disabled>No existen categorias</option>
			@endforelse
		</select>

	</div>
</div>
<br>
<div class="product-body">
	<div class="form-group">
		{{ Form::label('nombre', 'Nombre de la etiqueta') }}
		{{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
	</div>
	<div class="form-group">
		<div class="row">
			<div class="col-md-6">
				{{ Form::label('precio', 'Precio') }}
				{{ Form::text('precio', null, ['class' => 'form-control product-price', 'id' => 'precio']) }}
			</div>
			<div class="col-md-6">
				{{ Form::label('stock', 'Stock') }}
				{{ Form::text('stock', null, ['class' => 'form-control', 'id' => 'stock']) }}
			</div>	
		</div>
	</div>
	<div class="form-group">	
		<div class="col-md-6">
			{{ Form::label('nuevo', '¿En la sección de nuevos?') }}	
		</div>
		<div class="col-md-6">
			@if ($Producto->nuevo)
				<br>
				{{ Form::radio('nuevo', '0', false, ['class' => 'form-control', 'id' => 'nuevoNo']) }}
				{{ Form::label('nuevo', 'no') }}
				<br>
				{{ Form::radio('nuevo', '1', true, ['class' => 'form-control', 'id' => 'nuevoSi']) }}
				{{ Form::label('nuevo', 'si') }}
			@else
				<br>
				{{ Form::radio('nuevo', '0', true, ['class' => 'form-control', 'id' => 'nuevoNo']) }}
				{{ Form::label('nuevo', 'no') }}
				<br>
				{{ Form::radio('nuevo', '1', false, ['class' => 'form-control', 'id' => 'nuevoSi']) }}
				{{ Form::label('nuevo', 'si') }}
			@endif
		</div>
	</div>
	<hr>
	<div class="form-group">
		{{ Form::label('description', 'Descripción') }}
		{{ Form::textarea('description', null, ['class' => 'form-control']) }}
	</div>
	<div class="form-group">
		{{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
	</div>
</div>
