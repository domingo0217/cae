<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title>CAE | @yield('title')</title>
		{{-- Instanciando estilos y fuentes --}}
		{{-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> --}} {{-- comentado para usar los iconos locales--}}
		{{-- {!! MaterializeCSS::include_css() !!} --}}
		<link rel="stylesheet" href="/materialize-css/css/materialize.css">
		<link rel="stylesheet" type="text/css" href="/custom/css/main.css">
		<link rel="shortcut icon" type="image/png" href="img/logo3.png"/>

	</head>
	<body class="grey lighten-3">

		{{-- Header --}}
			@include('layouts.header')
		{{-- /Header2 --}}

		{{-- Main --}}
		<main class="container">
			{{-- SideBar --}}
				 @include('layouts.sidebar')
			{{-- /SideBar --}}
			@yield('content')
		</main>
		{{-- /Main --}}

		{{-- Footer --}}
			@include('layouts.footer')
		{{-- /Footer --}}

	</body>
</html>
