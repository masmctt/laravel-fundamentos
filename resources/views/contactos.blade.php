@extends('layout')

@section('contenido')
	<h1>Sección de contactos</h1>
	<h2>Escribeme</h2>
	@if( session()->has('info'))
		<h3>{{ session('info') }}</h3>
	@else
	<form method="POST" action="contacto">
		
		<!--input type="hidden" name="_token" value="{{ csrf_token() }}"-->
		<!--esto es mejor-->
		{{ csrf_field() }}
		<p><label for="nombre">
			Nombre
			<input type="text" name="nombre" value="{{ old('nombre') }}">
			{!! $errors->first('nombre','<span class=error>:message</span>') !!}
		</label></p>
		<p><label for="email">
			email
			<input type="email" name="email" value="{{ old('email') }}">
			{!! $errors->first('email','<span class=error>:message</span>') !!}
		</label></p>
		<p><label for="mensaje">
			Mensaje
			<textarea name="mensaje">{{ old('mensaje') }}</textarea>
			{!! $errors->first('mensaje','<span class=error>:message</span>') !!}
		</label></p>
		<input type="submit" value="Enviar">
		
	</form>
	@endif
	<hr>
@stop
