@extends('layouts/app')
@section('title', 'Lista de Tags')

@section('content')

<a href="{{ route('admin.tags.create') }} " class="btn btn-info">Registrar Tags</a>

<!-- Buscador -->
{{ Form::open(['route'=>'admin.tags.index', 'method'=> 'GET', 'class'=>'navbar-form pull-right']) }}
<div class="input-group form">
	{{ Form::text('name', null, ['class' => 'form-control', 'id'=>'search', 'placeholder'=>'Buscar Tag']) }}
	<span class="glyphicon glyphicon-search input-group-addon" aria-hidden="true" id="search"></span>
</div>
{{ Form::close() }}
<hr>
<!-- fin Buscador -->
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>		
			<th>Acciones</th>	
		</tr>
	</thead>
	<tbody>
		@foreach ($tags as $tag)
			<tr>
				<td>{{ $tag->id }}</td>
				<td>{{ $tag->name }}</td>
				
				<td>
					<a href="{{ route('admin.tag.destroy', $tag->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					<a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-retweet" aria-hidden="true"></span></a>
				</td>
			</tr>
		@endforeach 
	</tbody>
</table>
{{ $tags->render() }}
@endsection