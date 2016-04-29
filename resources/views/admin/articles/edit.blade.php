@extends('layouts/app')
@section('title', 'Edición de Tags')

@section('content')

	{{ Form::open(['url'=>'admin/tags/update', 'method' => 'PUT']) }}
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

