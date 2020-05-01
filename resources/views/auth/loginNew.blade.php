<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Misa</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendors/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendors/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendors/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendors/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendors/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendors/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="{{ asset('css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="POST" action="{{ route('login') }}">
					{{ csrf_field() }}
					<span class="login100-form-title">
						<img src="{{ asset('/images/dep-logo.png') }}"  width="20%">
						<img src="{{ asset('/images/UAEH.png') }}"  width="40%">
					</span>

					<div class="wrap-input100 {{ $errors->has('email') ? ' has-error' : '' }} validate-input m-b-16" data-validate="Por favor utilice su correo">
						<input class="input100" id="email" type="email" name="email" placeholder="Correo Electrónico" value="{{ old('email') }}" required autofocus>
						<span class="focus-input100"></span>						
					</div>
					@if ($errors->has('email'))
						<span class="help-block" style="color:brown">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
					<div class="wrap-input100 validate-input" data-validate = "Introduzca su contraseña">
						<input id="password" class="input100" type="password" name="password" placeholder="Contraseña" required>
						<span class="focus-input100"></span>
						
					</div>	
					@if ($errors->has('password'))
						<span class="help-block"  style="color:brown">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif			

					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							
						</span>

						<a href="#" class="txt2">
							
						</a>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Iniciar sesión
						</button>
					</div>

					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							¿Aún no está registrado?
						</span>

						<a href="{{ route('password.request') }}" class="txt3">
							Registrarse
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>