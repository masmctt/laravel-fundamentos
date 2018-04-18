@extends('layout')

@section('contenido')
	<header>Crear Usuario</header>

	<form method="POST" action="{{ route('usuarios.store') }}">

		@include('users.form',['user' => new App\User])

		<input class="btn btn-primary" type="submit" value="Guardar">
		
	</form>	

@stop