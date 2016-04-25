@extends('admin/template/main')
@section('title', 'Creación de Usuarios')

@section('content')

	{{ Form::open(['url'=>'admin/users/update', 'method' => 'PUT']) }}
		<div class="input-group">
			{{ Form::hidden('id', $user->id) }}
			{{ Form::label('name', 'Nombre') }}
			{{ Form::text('name', $user->name , ['class'=>'form-control', 'required', 'placeholder'=>'Nombre Completo']) }}

		</div>
		<div class="input-group">
			{{ Form::label('email', 'Correo Electronico') }}
			{{ Form::email('email', $user->email, ['class'=>'form-control', 'required', 'placeholder'=>'example@domain.com']) }}
		</div>
		<div class="input-group">
			{{ Form::label('type', 'Tipo') }}
			{{ Form::select('type', [''=>'Seleccione tipo', 'member'=> 'Miembro', 'admin'=>'Administrador'],$user->member, ['class'=>'form-control']) }}
		</div>
		<br>
		<div class="input-group">
			{{ Form::submit('Editar', ['class'=>'btn btn-primary']) }}
		</div>
	{{ Form::close() }}
@endsection

