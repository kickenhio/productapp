<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
	<!-- ANGULAR -->
	<script src="/js/angular.js"></script>
	<script src="/js/angular-resource.js"></script>
	<script src="/js/angular-route.js"></script>
	<script src="/js/angular-animate.js"></script>
	<script src="/js/myapp.js"></script>
	<base href="/" />
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
	<style>
		body {
			font-family: 'Lato';
		}

		.fa-btn {
			margin-right: 6px;
		}

		.view-animate.ng-enter, .view-animate.ng-leave {
			transition:all cubic-bezier(0.250, 0.460, 0.450, 0.940) 0.7s;
		}

		.view-animate.ng-enter,
		.view-animate.ng-leave.ng-leave-active {
			opacity: 0;
			position: absolute;
			top:0;
			width: 100%;
		}

		.view-animate.ng-leave,
		.view-animate.ng-enter.ng-enter-active {
			opacity: 1;
			position: absolute;
			top:0;
			width: 100%;
		}
    </style>
</head>
<body ng-app="productApp">
	<div ng-view class="view-animate">
		<nav class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">

					<!-- Collapsed Hamburger -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<!-- Branding Image -->
					<a class="navbar-brand" href="{{ url('/') }}">
						ProductApp
					</a>
				</div>

				<div class="collapse navbar-collapse" id="app-navbar-collapse">
					<!-- Left Side Of Navbar -->
					<ul class="nav navbar-nav">
						<!--<li><a href="{{ url('/home') }}">Home</a></li>-->
					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="nav navbar-nav navbar-right">
						<!-- Authentication Links -->
						@if (Auth::guest())
							<li><a href="{{ url('/login') }}">Login</a></li>
							<li><a href="{{ url('/register') }}">Register</a></li>
						@else
							<li>
								<a href="#">
									{{ Auth::user()->name }}
								</a>
							</li>
							<li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
						@endif
					</ul>
				</div>
			</div>
		</nav>
		@yield('content')
	</div>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
