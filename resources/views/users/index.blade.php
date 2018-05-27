@extends('layout')

@section('contenido')

	<h1>Usuarios</h1>
	<a class="btn btn-primary pull-right" href="{{ route('usuarios.create') }}">
		Crear nuevo usuario
	</a>
	<table class="table">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>role</th>
				<th>Nota</th>
				<th>Etiquetas</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($users as $user)
				<tr>
					<td> {{ $user->id }}	</td>
					<td> {{ $user->present()->link() }} </td>
					<td> {{ $user->email }} </td>
					<td> {{ $user->present()->roles() }} </td>
					<td>{{ $user->present()->notes() }}</td>
					<td>{{ $user->present()->tags() }}</td>
					<td>
						<a class="btn-info btn-sm" 
							href="{{ route('usuarios.edit',$user->id) }}"> Editar </a>
						<form style="display:inline" 
							method="POST" 
							action="{{ route('usuarios.destroy',$user->id) }}">
							{!! csrf_field() !!}
							{!! method_field('DELETE') !!}
							<button class="btn btn-danger btn-sm" type="submit">Eliminar</button>	
							
						</form>
						
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@stop