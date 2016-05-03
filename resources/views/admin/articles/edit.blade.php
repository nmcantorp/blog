@extends('layouts/app')
@section('title', 'Edición de Articulo - ' . $articles->title)

@section('content')

	{{ Form::open(['url'=>'admin/articles/update', 'method' => 'PUT']) }}
		<div class="form-group">
			{{ Form::hidden('id', $articles->id) }}
			{{ Form::label('title', 'Titulo') }}
			{{ Form::text('title', $articles->title, ['class'=>'form-control', 'required', 'placeholder'=>'Titulo']) }}
		</div>
		<div class="form-group">
			{{ Form::label('category_id', 'Categoria') }}
			{{ Form::select('category_id', $categories, $articles->category->id,  ['class'=>'form-control select-category', 'required', 'placeholder'=>'Seleccione la categoria']) }}
		</div>
		<div class="form-group">
			{{ Form::label('content', 'Contenido') }}
			{{ Form::textarea('content', $articles->content, ['class'=>'form-control', 'required', 'placeholder'=>'Contenido del articulo']) }}
		</div>
		<div class="form-group">
			{{ Form::label('tags', 'Tags') }}
			{{ Form::select('tags[]', $tags, $myTags, ['class'=>'form-control select-tag', 'multiple', 'required']) }}
		</div>
		<br>	
		<br>
		<div class="input-group">
			{{ Form::submit('Editar', ['class'=>'btn btn-primary']) }}
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

	$('#content').trumbowyg({});
</script>
@endsection