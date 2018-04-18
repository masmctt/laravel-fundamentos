<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<link rel="icon" href="../../../../favicon.ico">

		<title>Fixed top navbar example for Bootstrap</title>

		<!-- Bootstrap core CSS -->

		<!-- Custom styles for this template -->
		<link rel="stylesheet"  href="/css/app.css">
</head>

<body>
	<header>
		<?php function activeMenu($url){
			return request()->is($url) ? 'active' : '';
		} ?>
	<div class="container-fluid">
		<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
			<a class="navbar-brand" href="#">MENU</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarCollapse">
				<ul class="navbar-nav mr-auto">

					<li class="{{ activeMenu('/') }}">
						<a class="nav-link"  href="{{ route('home') }}">Inicio <span class="sr-only">(current)</span></a>
					</li>
					
					<li class="{{ activeMenu('saludos*') }}">
						<a class="nav-link"   href="{{ route('saludo','Marco') }}">Saludos <span class="sr-only">(current)</span></a>
					</li>
					
					<li class="{{ activeMenu('mensajes/create') }}">
						<a class="nav-link"   href="{{ route('mensajes.create') }} ">Contactos <span class="sr-only">(current)</span></a>
					</li>
					
					@if(auth()->check())
						<li class="{{ activeMenu('mensajes*') }}">
							<a class="nav-link"  href="{{ route('mensajes.index') }} ">Mensajes <span class="sr-only">(current)</span></a>
						</li>
						@if(auth()->user()->hasRoles(['admin']))
						<li class="{{ activeMenu('usuarios*') }}">
							<a class="nav-link"  href="{{ route('usuarios.index') }} ">Usuarios <span class="sr-only">(current)</span></a>
						</li>
						@endif
					@endif
				</ul>

					<ul class="navbar-nav mr-right">
						@if(auth()->guest())
							<li class="{{ activeMenu('login') }}">
								<a class="nav-link" href="/login">Login <span class="sr-only">(current)</span></a>
							</li>
						@else
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }}</a>
								<div class="dropdown-menu" aria-labelledby="dropdown03">
									<a class="dropdown-item" href="/usuarios/{{ auth()->id() }}/edit">Mi cuenta</a>
									<a class="dropdown-item" href="/logout">Cerrar sesión</a>
								</div>
							</li>

						@endif
					</ul>

			</div>
		</nav>
	</header>
	<br>
	<br>
	<br>
	<div class="container-fluid">
		@yield('contenido')
		<footer>Copyright {{ date('Y') }}</footer>	
	</div>
		<!-- Bootstrap core JavaScript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="/js/app.js"></script>

</body>
</html>