<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Saludo</title>
</head>
<body>
	<h1>Saludos2 para {{ $nombre}}</h1>

	<h1>Saludos2 para <?php echo $nombre; ?></h1>
	<h1>{{ $html }}</h1>
	<h1>{!! $html !!}</h1>
	<h1>{{ $script }}</h1>
	<h1>{!! $script !!}</h1>
	<ul>
		@foreach($consolas as $consola)
			<li>{{ $consola }}</li>
		@endforeach
	</ul>
	<ul>
		@forelse($consolas as $consola)
			<li>{{ $consola }}</li>
		@empty
			<p>No hay consolas :(</p>
		@endforelse
	</ul>
	@if (count($consolas)===1)
		<p>Solo tienes una consola</p>
	@elseif(count($consolas)>1)
		<p>Tienes varias consolas</p>
	@else
		<p>No tienes ninguna consola</p>
	@endif
	<header>
		<nav>
			<a href="<?php echo route('home') ?>">Inicio</a>
			<a href="<?php echo route('saludo') ?>">Saludos</a>
			<a href="<?php echo route('contactos') ?>">Contactos</a>
		</nav>
	</header>

</body>
</html>

