@extends('admin/template/main')
@section('title', 'Edición de Categorias')

@section('content')

	{{ Form::open(['url'=>'admin/categories/update', 'method' => 'PUT']) }}
		<div class="input-group">
			{{ Form::hidden('id', $category->id) }}
			{{ Form::label('name', 'Nombre') }}
			{{ Form::text('name', $category->name , ['class'=>'form-control', 'required', 'placeholder'=>'Nombre Completo']) }}

		</div>		
		<br>
		<div class="input-group">
			{{ Form::submit('Editar', ['class'=>'btn btn-primary']) }}
		</div>
	{{ Form::close() }}
@endsection

