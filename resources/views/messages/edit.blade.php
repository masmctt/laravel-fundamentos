@extends('layout')

@section('contenido')
<h1>Editar mensaje</h1>
	<form method="POST" action="{{ route('mensajes.update',$message->id) }}">
		
		<!--input type="hidden" name="_token" value="{{ csrf_token() }}"-->
		<!--esto es mejor-->
		{!! method_field('PUT') !!}
		@include('messages.form',[
			'btnText' => 'Actualizar',
			'showFields' => ! $message->user_id
		])		
	</form>
@stop