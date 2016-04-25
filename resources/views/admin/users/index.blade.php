@extends('admin/template/main')
@section('title', 'Lista de Usuarios')

@section('content')

<a href="{{ route('admin.users.create') }} " class="btn btn-info">Registrar Usuario</a><hr>
{{ $users->render() }}
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Correo Electronico</th>
			<th>Tipo</th>
			<th>Acciones</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				<td>
				@if ($user->member == 'admin')
					<h4><span class="label label-danger">{{ $user->member }}</span></h4>
				@else
					<h4><span class="label label-primary">{{ $user->member }}</span></h4>
				@endif
				</td>
				<td>
					<a href="{{ route('admin.users.destroy', $user->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-retweet" aria-hidden="true"></span></a>
				</td>
			</tr>
		@endforeach 
	</tbody>
</table>

@endsection