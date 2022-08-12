<!DOCTYPE html>
<html lang="zxx">
<head>

	<!-- Basic Page Needs
	================================================== -->
	<title>Alchemists Basketball Club &amp; Sports News HTML Template - Login</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Sports Club, League and News HTML Template">
	<meta name="author" content="Dan Fisher">
	<meta name="keywords" content="sports club news HTML template">

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="assets/images/basketball/favicons/favicon.ico">
	<link rel="apple-touch-icon" sizes="120x120" href="{{asset('assets/images/basketball/favicons/favicon-120.png')}}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{asset('assets/images/basketball/favicons/favicon-152.png')}}">

	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">

	<!-- Google Web Fonts
	================================================== -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&amp;family&#x3D;Source+Sans+Pro:wght@400;700&amp;display&#x3D;swap" rel="stylesheet">

	<!-- CSS
	================================================== -->
	<!-- Vendor CSS -->
	<link href="{{asset('assets/vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
	<link href="{{asset('assets/fonts/font-awesome/css/all.min.css')}}" rel="stylesheet">
	<link href="{{asset('assets/fonts/simple-line-icons/css/simple-line-icons.css')}}" rel="stylesheet">
	<link href="{{asset('assets/vendor/magnific-popup/dist/magnific-popup.css')}}" rel="stylesheet">
	<link href="{{asset('assets/vendor/slick/slick.css')}}" rel="stylesheet">

	<!-- Template CSS-->
	<link href="{{asset('assets/css/style-basketball.css')}}" rel="stylesheet">

	<!-- Custom CSS-->
	<link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">

</head>
<body data-template="template-basketball">

	<div class="clearfix site-wrapper">
        <div class="site-content">
			<div class="container">		
				<div class="row">	
                    <div class="col-md-3">
                    </div>	
					<div class="col-md-6">
						<!-- Login -->
						<div class="card">
							<div class="card__header">
								<h4>Login to your Account</h4>
							</div>
							<div class="card__content">
		
								<!-- Login Form -->
								<form method="POST" action="{{ route('login') }}">
                                @csrf
									<div class="form-group">
										<label for="login-name">Your Email</label>
										<input type="email" name="email" id="email" class="form-control" :value="old('email')" required autofocus  placeholder="Enter your email address...">
									</div>
									<div class="form-group">
										<label for="login-password">Your Password</label>
										<input type="password" name="password" id="password" class="form-control" required placeholder="Enter your password...">
									</div>
									<div class="form-group form-group--password-forgot">
										<label class="checkbox checkbox-inline">
											<input type="checkbox" id="remember_me" name="remember" value="option1" checked> {{ __('Remember me') }}
											<span class="checkbox-indicator"></span>
										</label>
                                        @if (Route::has('password.request'))
										    <span class="password-reminder"><a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a></span>
                                        @endif
									</div>
									<div class="form-group form-group--sm">
										<button type="submit" class="btn btn-primary-inverse btn-lg btn-block">{{ __('Log in') }}</button>
									</div>
									<div class="row">
										<div class="col-md-6">
											<button class="btn btn-facebook btn-icon btn-block"><i class="fab fa-facebook"></i> Sign In via Facebook</button>
										</div>
										<div class="col-md-6">
											<button class="btn btn-twitter btn-icon btn-block"><i class="fab fa-twitter"></i> Sign in via Twitter</button>
										</div>
									</div>
								</form>
								<!-- Login Form / End -->
		
							</div>
						</div>
						<!-- Login / End -->
					</div>
                    <div class="col-md-3">
                    </div>	
                    
				</div>
			</div>
		</div>
    </div>

<!-- Javascript Files
================================================== -->
<!-- Core JS -->
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery/jquery-migrate.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/core.js')}}"></script>


<!-- <script src="{{asset('assets/vendor/twitter/jquery.twitter.js')}}"></script>  -->


<script src="{{asset('assets/js/init.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>

</body>
</html>