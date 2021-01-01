<!DOCTYPE html>
<html lang="en">
<head>
	<title>Reset Password</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{URL::to('public/login/images/icons/favicon.ico')}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset('public/login/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/login/vendor/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/login/vendor/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/login/vendor/animsition/css/animsition.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/login/vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/login/vendor/daterangepicker/daterangepicker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/login/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('public/login/css/main.css')}}">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(public/login/images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Reset Your Password
					</span>
				</div>
                
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                 @endif

                <form class="login100-form validate-form" method="POST" action="{{ route('password.email') }}">
                    @csrf
					<div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Email</span>
						<input class="input100 {{ $errors->has('email') ? ' is-invalid' : '' }}"  id="email" type="email" name="email" value="{{ old('email') }}" required placeholder="Enter email address">
                        <span class="focus-input100"></span>
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
							{{ __('Send Password Reset Link') }}
						</button>
                    </div>
				</form>
			</div>
		</div>
	</div>
	

	<script src="{{asset('public/login/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<script src="{{asset('public/login/vendor/animsition/js/animsition.min.js')}}"></script>
	<script src="{{asset('public/login/vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('public/login/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/login/vendor/select2/select2.min.js')}}"></script>
	<script src="{{asset('public/login/vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('public/login/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{asset('public/login/vendor/countdowntime/countdowntime.js')}}"></script>
	<script src="{{asset('public/login/js/main.js')}}"></script>

</body>
</html>

