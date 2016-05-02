@extends('layouts/app')
@section('title', 'Lista de Articulos')

@section('content')

<a href="{{ route('admin.articles.create') }} " class="btn btn-info">Crear Articulo</a>

<!-- Buscador -->
{{ Form::open(['route'=>'admin.articles.index', 'method'=> 'GET', 'class'=>'navbar-form pull-right']) }}
<div class="input-group form">
	{{ Form::text('name', null, ['class' => 'form-control', 'id'=>'search', 'placeholder'=>'Buscar Articulo']) }}
	<span class="glyphicon glyphicon-search input-group-addon" aria-hidden="true" id="search"></span>
</div>
{{ Form::close() }}
<hr>
<!-- fin Buscador -->
<table class="table table-hover">
	<thead>
		<tr>
			<th>ID</th>
			<th>Titulo</th>		
			<th>Contenido</th>		
			<th>Acciones</th>	
		</tr>
	</thead>
	<tbody>
		@foreach ($articles as $article)
			<tr>
				<td>{{ $article->id }}</td>
				<td>{{ $article->title }}</td>
				<td>{{ $article->content }}</td>				
				<td>
					<a href="{{ route('admin.articles.destroy', $article->id) }}" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
					<a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-retweet" aria-hidden="true"></span></a>
				</td>
			</tr>
		@endforeach 
	</tbody>
</table>
{{ $articles->render() }}
@endsection