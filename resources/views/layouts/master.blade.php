<!doctype html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Emakers Júnior')</title>

	<!-- Includes -->
	@include('partials.bootstrap')

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Sunflower:300" rel="stylesheet">        

        <!-- Styles -->
        @section('link')
        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
        @show

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #57b846; box-shadow: 0px 1px 5px #444;">
                
                <div class="container">

                        <a class="navbar-brand h1 mb-0" href="{{ route('dashboard.view') }}"> Home </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite,#navbarImg">

                                <span class="navbar-toggler-icon"></span>

                        </button>

                        <div class="collapse navbar-collapse" id="navbarSite" style="font-size: 0.7rem;">

                                <ul class="navbar-nav mr-auto">
                                @section('nav-items')
                                        <li class="nav-item mr-2">
                                                <a class="nav-link" href="blog.html">Locals</a>
                                        </li>

                                        <li class="nav-item mr-2">
                                                <a class="nav-link" href="#servicos">Services</a>
                                        </li>

                                        <li class="nav-item mr-2">
                                                <a class="nav-link" href="equipe.html">About us</a>
                                        </li>
                                        <li class="nav-item mr-2">
                                                <a class="nav-link" href="contato.html">Support</a>
                                        </li>
                                @show
                                </ul>

	                        <ul class="navbar-nav navbar-right">
            		            <!-- Authentication Links -->
                        		@guest
		                        <li><a href="{{ route('login') }}">Login</a></li>
                		        <li><a href="{{ route('register') }}">Register</a></li>
		                        @else

								<li class="nav-item dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                	</a>
									<ul class="dropdown-menu" >
										<li>
                        		    			<a  class="dropdown-item"  href="{{ route('logout') }}"
                	        	        	        	onclick="event.preventDefault();
                                        	        		document.getElementById('logout-form').submit();">
	                                		        	<span class="text-danger ">Logout</span>
	       	                  	        		</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>

					<!--
                		        <li class="dropdown">
                                		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
		                                {{ Auth::user()->name }} <span class="caret"></span>
                		                </a>

		                               	<ul class="dropdown-menu">
        		                            	<li>
                        		    	            <a class="dropdown-item" href="{{ route('logout') }}"
                	        	        	            onclick="event.preventDefault();
                                        	        	    document.getElementById('logout-form').submit();">
	                                		            Logout
        	                  	            	    </a>

	                                	            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        	                                	    	{{ csrf_field() }}
	                	          	            </form>
                        	         	       </li>
	                              		</ul>
	        	                </li>-->
	                	        @endguest
	         	        </ul>
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
        @section('script')

        @show
    </body>
</html>
