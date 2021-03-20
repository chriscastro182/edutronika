<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" >
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Edutroniks') }}</title>
		
		@yield('stylesheets') <!-- Child will insert custom childsheets as required -->
		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/slick.css') }}"/>
		<link type="text/css" rel="stylesheet" href="{{ asset('css/slick-theme.css') }}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/nouislider.min.css') }}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{ asset('css/style.css') }}"/>
		
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +52-771-746-1128</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> edutroniks@email.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> San Antonio, 8, Carboneras, Pachuca, Hgo</a></li>
					</ul>
					<ul class="header-links pull-right">
						@if (Route::has('login'))
							@auth
								<li>
									<a href="{{ route('home') }}">
										<i class="fa fa-user-o"></i> 
										Home
									</a>
								</li>
								@can('productos.index')
								<li class="{{ setActive('productos.index') }}">
									<a class="nav-link" href="{{ route('productos.index') }}">Admin Productos</a>
								</li>
								@endcan
							@else
								<li>
									<a href="{{ route('login') }}">
										<i class="fa fa-user-o"></i> 
										Iniciar Sesión
									</a>
								</li>
								<li>
									<a href="{{ route('register') }}">
										<i class="fa fa-user-o"></i> 
										Registrarse
									</a>
								</li>
							@endauth
						@endif
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header"  >
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-1">
							<div class="header-logo">
								<a href="{{ url('/') }}" class="logo">
									<img src="{{ asset('img/perfilEdu.jpg') }}" width="90%">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-8">
							{{-- Include searchBar--}}
							@include('layouts.search')
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Lista de deseos</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Carrito</span>
										<div class="qty">3</div>
									</a>
									{{-- Lista del carrito --}}
									<div class="cart-dropdown">
										<div class="cart-list">
											<div class="product-widget">
												<div class="product-img">
													<img src="{{ asset('img/product01.png') }}" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">Nombre del producto</a></h3>
													<h4 class="product-price"><span class="qty">1x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

											<div class="product-widget">
												<div class="product-img">
													<img src="{{ asset('img/product02.png') }}" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">Nombre del producto</a></h3>
													<h4 class="product-price"><span class="qty">3x</span>$980.00</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
										</div>
										<div class="cart-summary">
											<small>3 Item(s) selected</small>
											<h5>SUBTOTAL: $2940.00</h5>
										</div>
										<div class="cart-btns">
											<a href="#">View Cart</a>
											<a href="#">Checkout  <i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
                    <!-- NAV -->                     
					<ul class="main-nav nav navbar-nav">
                        <li class="{{ setActive('home') }}"><a href="{{ route('home')}}">Inicio</a></li>
                        @can('productos.index')
                        <li class="{{ setActive('productos.index') }}">
                            <a class="nav-link" href="{{ route('productos.index') }}">Admin Productos</a>
                        </li>
                        @endcan
                        @can('users.index')
                        <li class="{{ setActive('users.index') }}" >
                            <a class="nav-link" href="{{ route('users.index') }}">Usuarios</a>
                        </li>
                        @endcan
                        @can('roles.index')
                        <li class="{{ setActive('roles.index') }}">                            
                            <a class="nav-link" href="{{ route('roles.index') }}">Roles</a>
                        </li>
                        @endcan
						<li><a href="#">Ofertas</a></li>
						<li><a href="{{ route('productos.indexClients') }}">Productos</a></li>
						<li><a href="#">Categorias</a></li>
						<li><a href="#">Carrito</a></li>
						{{--<li><a href="#">Cameras</a></li>
						<li><a href="#">Accessories</a></li> --}}
					</ul>
					<!-- /NAV -->
                </div>
                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Iniciar sesión</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
								@can('productos.index')
									<li class="{{ setActive('productos.index') }}">
										<a class="nav-link" href="{{ route('productos.index') }}">Admin Productos</a>
									</li>
								@endcan
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

        <!-- SECTION -->
        @if (session('info'))
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="alert alert-success">
                        {{ session('info') }}
                    </div>
                </div>
            </div>
        </div>
        @endif

        @yield('content')


		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Nosotros</h3>
								<p>Coadyuvar al desarrollo de proyectos según sean requeridos para la formación académica</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>San Antonio, 8, Carboneras, Pachuca, Hgo</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>771-746-1128</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>contacto@edutronika.com</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categorias</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div>

						<div class="clearfix visible-xs"></div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Informacion</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div>

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Vision</h3>
								<ul class="footer-links">
									<li><a href="#">My Account</a></li>
									<li><a href="#">View Cart</a></li>
									<li><a href="#">Wishlist</a></li>
									<li><a href="#">Track My Order</a></li>
									<li><a href="#">Help</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="{{ asset('js/jquery.min.js') }}">		</script>
		<script src="{{ asset('js/bootstrap.min.js') }}">	</script>
		<script src="{{ asset('js/slick.min.js') }}">		</script>
		<script src="{{ asset('js/nouislider.min.js') }}">	</script>
		<script src="{{ asset('js/jquery.zoom.min.js') }}">	</script>
		<script src="{{ asset('js/main.js') }}">			</script>
		@stack('scripts')
	</body>
</html>
