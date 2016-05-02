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
			{{ Form::select('category_id', $categories,null,  ['class'=>'form-control', 'required', 'placeholder'=>'Seleccione una categoria']) }}
		</div>
		<div class="form-group">
			{{ Form::label('content', 'Contenido') }}
			{{ Form::textarea('content', null, ['class'=>'form-control', 'required', 'placeholder'=>'Contenido del articulo']) }}
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

