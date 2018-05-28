<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title', 'Plano de Controle Disciplinar')</title>

	<!-- Includes -->
	@include('partials.bootstrap')

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
	@section('link')
	<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css">
	@show

    </head>
    <body>
	<nav class="navbar navbar-expand-lg navbar-light bg-@yield('nav-color','light')">
		@if ($__env->yieldContent('nav-logo') === "black" )
		<a class="collapse navbar-collapse" id="navbarImg" href="#"><img  src="{{asset('img/emakersjr-black.png')}}" height="60em"></a>
		@elseif ($__env->yieldContent('nav-logo') === "white" )
		<a class="collapse navbar-collapse" id="navbarImg" href="#"><img  src="{{asset('img/emakersjr-white.png')}}" height="60em"></a>
		@else
		<a class="collapse navbar-collapse" id="navbarImg" href="#"><img  src="{{asset('img/emakersjr-colored.png')}}" height="60em"></a>
		@endif
		<div class="container">

			<a class="navbar-brand h1 mb-0" href="#"> Home </a>

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite,#navbarImg">

				<span class="navbar-toggler-icon"></span>	

			</button>

			<div class="collapse navbar-collapse" id="navbarSite">

				<ul class="navbar-nav mr-auto">
				@section('nav-items')
					<li class="nav-item mr-2">
						<a class="nav-link" href="blog.html">Blog</a>
					</li>

					<li class="nav-item mr-2">
						<a class="nav-link" href="#servicos">Serviços</a>
					</li>

					<li class="nav-item mr-2">
						<a class="nav-link" href="equipe.html">Equipe</a>
					</li>
					<li class="nav-item mr-2">
						<a class="nav-link" href="contato.html">Contato</a>
					</li>
				@show
				</ul>

				@section('search-bar')
				<ul class="navbar-nav ml-auto">
					<form class="form-inline">
						<input type="search" class="form-control mr-2" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Pesquisar...">
						<button class="btn btn-light" type="Submit"> 	<img src="img/lupa.svg" height="15rem">
						</button>
					</form>
				</ul>
				@show
			</div>
		</div>
	</nav>
   <!-- <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif
   -->
            <div class="container text-center">
		@yield('content')
	    </div>
        </div>
        @yield('footer')
    </body>
</html>
