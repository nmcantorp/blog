@extends('admin/template/main')
@section('title', 'Creación de Usuarios')

@section('content')
	{{ Form::open(['url'=>'admin/users', 'method' => 'POST']) }}
		<div class="input-group">
			{{ Form::label('name', 'Nombre') }}
			{{ Form::text('name', null, ['class'=>'form-control', 'required', 'placeholder'=>'Nombre Completo']) }}

		</div>
		<div class="input-group">
			{{ Form::label('email', 'Correo Electronico') }}
			{{ Form::email('email', null, ['class'=>'form-control', 'required', 'placeholder'=>'example@domain.com']) }}
		</div>
		<div class="input-group">
			{{ Form::label('password', 'Contraseña') }}
			{{ Form::password('password', ['class'=>'form-control', 'required', 'placeholder'=>'*********']) }}
		</div>
		<div class="input-group">
			{{ Form::label('member', 'Tipo') }}
			{{ Form::select('member', [''=>'Seleccione tipo', 'member'=> 'Miembro', 'admin'=>'Administrador'],null, ['class'=>'form-control']) }}
		</div>
		<br>
		<div class="input-group">
			{{ Form::submit('Aceptar', ['class'=>'btn btn-primary']) }}
		</div>
	{{ Form::close() }}
@endsection

