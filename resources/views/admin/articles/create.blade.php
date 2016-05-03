@extends('layouts/app')
@section('title', 'Creación de Articulos')

@section('content')

	{{ Form::open(['url'=>'admin/articles', 'method' => 'POST', 'files'=>true]) }}
		<div class="form-group">
			{{ Form::label('title', 'Titulo') }}
			{{ Form::text('title', null, ['class'=>'form-control', 'required', 'placeholder'=>'Titulo']) }}
		</div>
		<div class="form-group">
			{{ Form::label('category_id', 'Categoria') }}
			{{ Form::select('category_id', $categories,null,  ['class'=>'form-control select-category', 'required']) }}
		</div>
		<div class="form-group">
			{{ Form::label('content', 'Contenido') }}
			{{ Form::textarea('content', null, ['class'=>'form-control', 'required', 'placeholder'=>'Contenido del articulo']) }}
		</div>
		<div class="form-group">
			{{ Form::label('tags', 'Tags') }}
			{{ Form::select('tags[]', $tag, null, ['class'=>'form-control select-tag', 'multiple', 'required']) }}
		</div>
		<div class="form-group">
			{{ Form::label('imagen', 'imagen') }}
			{{ Form::file('imagen') }}
		</div>
		<br>
		<div class="input-group">
			{{ Form::submit('Aceptar', ['class'=>'btn btn-primary']) }}
		</div>
	{{ Form::close() }}
@endsection

@section('js')
<script>	
	$('.select-tag').chosen({
		no_results_text: "Tag que esta buscando no existe",
		placeholder_text_multiple: "Selecciones maximo 3 tags",
		max_selected_options: 3
	});

	$('.select-category').chosen({
		no_results_text: "Categoria que esta buscando no existe",
		placeholder_text_single: "Selecciones una categoria",
		max_selected_options: 3
	});

	$('#content').trumbowyg({

	});
</script>
@endsection