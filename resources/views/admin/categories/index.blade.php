@extends('admin/template/main')
@section('title', 'Lista de Categorias')

@section('content')

<a href="{{ route('admin.categories.create') }} " class="btn btn-info">Registrar Categoria</a><hr>
{{ $categories->render() }}
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>		
			<th>Acciones</th>	
		</tr>
	</thead>
	<tbody>
		@foreach ($categories as $category)
			<tr>
				<td>{{ $category->id }}</td>
				<td>{{ $category->name }}</td>
				
				<td>
					<a href="{{ route('admin.categories.destroy', $category->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					<a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-retweet" aria-hidden="true"></span></a>
				</td>
			</tr>
		@endforeach 
	</tbody>
</table>

@endsection