		<!--input type="hidden" name="_token" value="{{ csrf_token() }}"-->
		<!--esto es mejor-->
		{{ csrf_field() }}
		<!--Si queremos un mensaje nuevo de un usuario autenticado-->
		<!--No se deberian mostrar los campos de nombre e email -->
		<!--Como el mensaje no existe los muestra -->
		<!--se arregla cambiando  -->
		<!-- unless( $message->user_id) -->
		<!-- la variable $showFields se debe declara en el form del create y el edit-->
		<!-- Sera verdadero al crear si el usuario es un invitado 'showFields' => auth()->guest() -->
		<!-- Sera verdadero al editar si el mensaje no cuenta con un usuario 'showFields' => ! $message->user_id -->

		@if($showFields)
			<p><label for="nombre">
				Nombre
				<input class="form-control" type="text" name="nombre" value="{{ $message->nombre or old('nombre') }}">
				{!! $errors->first('nombre','<span class=error>:message</span>') !!}
			</label></p>
			<p><label for="email">
				email
				<input class="form-control" type="email" name="email" value="{{ $message->email or old('email') }}">
				{!! $errors->first('email','<span class=error>:message</span>') !!}
			</label></p>
		@endif
		<p><label for="mensaje">
			Mensaje
			<textarea class="form-control" name="mensaje">{{ $message->mensaje or old('mensaje') }}</textarea>
			{!! $errors->first('mensaje','<span class=error>:message</span>') !!}
		</label></p>
		<!--input class="btn btn-primary" type="submit" value="{ isset($btnText) ? $btnText : 'Guardar' }}"-->
		<!--Esto es mas limpi pero solo funciona con PHP7	-->
		<!--input class="btn btn-primary" type="submit" value="{ $btnText ?? 'Guardar' }}"-->
		<!--Con laravel es mejor esto y no es necesario PHP7	-->
		<input class="btn btn-primary" type="submit" value="{{ $btnText or 'Guardar' }}">