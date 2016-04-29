@extends('layouts/app')
@section('title', 'Creación de Articulos')

@section('content')

	{{ Form::open(['url'=>'admin/articles', 'method' => 'POST', 'Files'=>true]) }}
		<div class="form-group">
			{{ Form::label('title', 'Titulo') }}
			{{ Form::text('title', null, ['class'=>'form-control', 'required', 'placeholder'=>'Titulo']) }}
		</div>
		<div class="form-group">
			{{ Form::label('category_id', 'Categoria') }}
			{{ Form::select('category_id', $categories,null,  ['class'=>'form-control', 'required', 'placeholder'=>'Seleccione una categoria']) }}
		</div>
		<div class="form-group">
			{{ Form::label('content', 'Contenido') }}
			{{ Form::textarea('content', null, ['class'=>'form-control', 'required', 'placeholder'=>'Nombre Completo']) }}
		</div>
		<div class="form-group">
			{{ Form::label('tags', 'Tags') }}
			{{ Form::select('tags', $tag,null,  ['class'=>'form-control', 'required','multiple']) }}
		</div>
		<div class="form-group">
			{{ Form::label('name', 'Nombre') }}
			{{ Form::text('name', null, ['class'=>'form-control', 'required', ]) }}
		</div>
		
		<br>
		<div class="input-group">
			{{ Form::submit('Aceptar', ['class'=>'btn btn-primary']) }}
		</div>
	{{ Form::close() }}
@endsection

