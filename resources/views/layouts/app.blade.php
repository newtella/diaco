<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="{{url('img/logodiaco.PNG')}}">
	<link rel="icon" type="image/png" href="{{url('img/logodiaco.PNG')}}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Diaco Web App</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<!-- CSS Files -->
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('css/material-kit.css') }}" rel="stylesheet" />


	@yield('css')







</head>

<body class="@yield('body-class')">
	<nav class="navbar navbar-default navbar-absolute">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="/">
           <div class="logo-container">
                <div class="logo">
                    <img src="{{url('img/logodiaco.PNG')}}" width="150px" height="50px" alt="Creative Tim Logo" class="img-rounded img-responsive img-raised">
                </div>
            </div>
      <div class="ripple-container"></div></a>
			<!-- 	<a class="navbar-brand" href="/"><img src="/img/GobiernoLogo.jpg" width="545px" height="120px" alt=""></a> -->
			</div>

			<div class="collapse navbar-collapse" id="navigation-example">
				<ul class="nav navbar-nav navbar-right">
					@guest
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
					</li>
					@if (Route::has('register'))
					<li class="nav-item">
						<a class="nav-link" href="{{ route('register') }}">{{ __('Registro') }}</a>
					</li>
					@endif
					@else

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="material-icons">add_business</i>
						Comercios <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="{{ route('shops.index') }}">Ver Comercios</a></li>
							<li class="divider"></li>
							<li><a class="dropdown-item" href="{{ route('shops.create') }}">Registrar Comercio</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="material-icons">storefront</i>
						Sucursales <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="{{ route('branches.index') }}">Ver Sucursales</a></li>
							<li class="divider"></li>
							<li><a class="dropdown-item" href="{{ route('branches.create') }}">Crear Sucursal</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="material-icons">assignment</i>
						Quejas y Resoluciones <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="{{ route('complains.index') }}">Ver Quejas</a></li>
							<li class="divider"></li>
							<li><a class="dropdown-item" href="{{ route('resolutions.index') }}">Ver Resoluciones</a></li>
						</ul>
					</li>
				

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="material-icons">leaderboard</i>
						Reporteria <b class="caret"></b></a>
						<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="{{ route('vistaQuejas') }}">Quejas por Sucursal</a></li>
						<li class="divider"></li>
						<li><a class="dropdown-item" href="{{ route('home') }}">Quejas por Status</a></li>
						<li class="divider"></li>
						<li><a class="dropdown-item" href="{{ route('vreport_sinquejas') }}">Sucursales sin reportes</a></li>
						<li class="divider"></li>
						<li><a class="dropdown-item" href="{{ route('vreport_quejas') }}">Listado de Quejas</a></li>
						</ul>
					</li>

					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="material-icons">account_circle</i>
						{{ Auth::user()->name }} <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
														document.getElementById('logout-form').submit();">
									{{ __('Cerrar Sesión') }}
								</a></li>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
								@csrf
							</form>

						</ul>
					</li>

					@endguest
					<!--  <li>
		                <a href="https://twitter.com/CreativeTim" target="_blank" class="btn btn-simple btn-white btn-just-icon">
							<i class="fa fa-twitter"></i>
						</a>
		            </li>
		            <li>
		                <a href="https://www.facebook.com/CreativeTim" target="_blank" class="btn btn-simple btn-white btn-just-icon">
							<i class="fa fa-facebook-square"></i>
						</a>
		            </li>
					<li>
		                <a href="https://www.instagram.com/CreativeTimOfficial" target="_blank" class="btn btn-simple btn-white btn-just-icon">
							<i class="fa fa-instagram"></i>
						</a>
		            </li> -->
				</ul>
			</div>
		</div>
	</nav>

	<div class="wrapper">
		@yield('content')

	</div>


</body>
<footer class="footer">
</footer>
<!--   Core JS Files   -->
<script src="{{asset ('js/jquery.js') }}" type="text/javascript"></script>
<script src="{{asset ('js/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/material.min.js') }}"></script>

@yield('scripts')




<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{ asset('js/nouislider.min.js') }}" type="text/javascript"></script>

<!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
<script src="{{ asset('js/bootstrap-datepicker.js') }}" type="text/javascript"></script>

<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
<script src="{{ asset('js/material-kit.js') }}" type="text/javascript"></script>

</html>