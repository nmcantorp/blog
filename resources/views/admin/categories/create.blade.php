@extends('admin/template/main')
@section('title', 'Creación de Usuarios')

@section('content')

	{{ Form::open(['url'=>'admin/categories', 'method' => 'POST']) }}
		<div class="input-group">
			{{ Form::label('name', 'Nombre') }}
			{{ Form::text('name', null, ['class'=>'form-control', 'required', 'placeholder'=>'Nombre Completo']) }}

		</div>
		<br>
		<div class="input-group">
			{{ Form::submit('Aceptar', ['class'=>'btn btn-primary']) }}
		</div>
	{{ Form::close() }}
@endsection

