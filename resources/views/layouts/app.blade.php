<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<!-- Fonts -->
		<link rel="dns-prefetch" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

		@include('includes.head')
		<title>
			@if(!Auth::guard('aluno')->check() && !Auth::check())
				Entrar | S.O.S Enade
			@else
				@yield('titulo') | S.O.S Enade
			@endif
		</title>
	</head>
	
	<body style="background: #EEE">
		<!-- Barra Brasil -->
		<div id="barra-brasil" style="background:#7F7F7F; height: 20px; padding:0 0 0 10px; display:block;">
			<ul id="menu-barra-temp" style="list-style:none;">
				<li style="display:inline; float:left;padding-right:10px; margin-right:10px; border-right:1px solid #EDEDED">
					<a href="http://brasil.gov.br" style="font-family:sans,sans-serif; text-decoration:none; color:white;">Portal do Governo Brasileiro</a>
				</li>
				<li>
					<a style="font-family:sans,sans-serif; text-decoration:none; color:white;" href="http://epwg.governoeletronico.gov.br/barra/atualize.html">Atualize sua Barra de Governo</a>
				</li>
			</ul>
		</div>

		<!-- Barra de Logos -->
		<div id="barra-logos" style="background:#FFFFFF; margin-top: 1px; height: 150px; padding: 10px 0 10px 0">
			<div class="container">
				<ul id="logos" style="list-style:none;">
					<li style="margin-right:30px; border-right:1px">
						<a href="{{ route('home') }}"><img src="{{asset('1.png')}}" height="100px" align = "left" ></a>
						<a target="_blank" href="http://lmts.uag.ufrpe.br/"><img src="{{asset('images/lmts3.png')}}" style = "margin-top: 1% " height="80" align = "right" ></a>
						<img src="{{asset('images/separador.png')}}" style = "margin-left: 15px; margin-top: 1%" height="70" align = "right" >
						<a target="_blank" href="http://ww3.uag.ufrpe.br/"><img src="{{asset('images/uag.png')}}" style = "margin-left: 10px; margin-top: 1%" height="80" width="70" align = "right" ></a>
						<img src="{{asset('images/separador.png')}}" style = "margin-left: 15px; margin-top: 1%" height="70" align = "right" >
						<a target="_blank" href="http://www.ufrpe.br/"><img src="{{asset('images/ufrpe.png')}}" style = "margin-left: 15px; margin-right: -10px; margin-top: 1% " height="80" width="70" align = "right"></a>
					</li>
				</ul>
			</div>
		</div>

		<div id="app">
			<!-- Barra da tela de Login -->
			@if(!Auth::guard('aluno')->check() && !Auth::check())
				<nav class="navbar navbar-dark navbar-expand-lg" style="background-color: #1B2E4F; border-color: #d3e0e9" role="navigation">
					<div class="container">
						<a class="navbar-brand" href="{{ url('/') }}">
							S.O.S Enade
						</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
							<span class="navbar-toggler-icon"></span>
						</button>

						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<!-- Left Side Of Navbar -->
							<ul class="navbar-nav mr-auto">

							</ul>

							<!-- Right Side Of Navbar -->
							<ul class="navbar-nav ml-auto">
								<!-- Authentication Links -->
								@guest
									<li class="nav-item">
										<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
									</li>
								@else
									<li class="nav-item dropdown">
										<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
											{{ Auth::user()->name }} <span class="caret"></span>
										</a>
										<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
											<a class="dropdown-item" href="{{ route('logout') }}"
											   onclick="event.preventDefault();
															 document.getElementById('logout-form').submit();">
												{{ __('Logout') }}
											</a>
											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
												@csrf
											</form>
										</div>
									</li>
								@endguest
							</ul>
						</div>
					</div>
				</nav>
			@else
				@include('includes.nav_bar')
			@endif
			<main class="py-4">
				<div class="container justify-content-center">
					@yield('content')
				</div>
			</main>
		</div>
	</body>
	@include('includes.footer')
</html>