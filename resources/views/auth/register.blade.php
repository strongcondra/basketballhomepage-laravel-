<!DOCTYPE html>
<html lang="zxx">
<head>

	<!-- Basic Page Needs
	================================================== -->
	<title>Alchemists Basketball Club &amp; Sports News HTML Template - Register</title>
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
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
	<link rel="stylesheet" href="{{asset('country/dependancies/bootstrap-select-1.12.4/dist/css/bootstrap-select.min.css')}}">

</head>
<body data-template="template-basketball">

	<div class="clearfix site-wrapper">
        <div class="site-content">
			<div class="container">		
				<div class="row">	
                    <div class="col-md-3">
                    </div>	
					<div class="col-md-6">
		
						<!-- Register -->
						<div class="card">
							<div class="card__header">
								<h4>Register Now</h4>
							</div>
							<div class="card__content">
                                <x-auth-validation-errors class="mb-4" :errors="$errors" />
								<!-- Register Form -->
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <div class="form-group">
										<label for="name">Your name</label>
										<input type="text" name="name" id="name" class="form-control" :value="old('name')" required  placeholder="Enter your Name...">
									</div>
									<div class="form-group">
										<label for="email">Your Email</label>
										<input type="email" name="email" id="email" class="form-control" :value="old('email')" required  placeholder="Enter your email address...">
									</div>
									<div class="form-group">
										<label for="password">Your Password</label>
										<input type="password" name="password" id="password" class="form-control" required  placeholder="Enter your password...">
									</div>
									<div class="form-group">
										<label for="password_confirmation">Repeat Password</label>
										<input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required placeholder="Repeat your password...">
									</div>
                                    <div>
                                        <h4>Psersonal Information</h4>
                                    </div>
									<div class="df-billing-fields">
		
										<div class="row">
		
											<div class="col-md-6">
												<div class="form-group">
													<label for="firstname">First Name <abbr class="required" title="required">*</abbr></label>
													<input type="text" name="firstname" id="firstname" class="form-control" placeholder="Your first name...">
												</div>
											</div>
		
											<div class="col-md-6">
												<div class="form-group">
													<label for="lastname">Last Name <abbr class="required" title="required">*</abbr></label>
													<input type="text" name="lastname" id="lastname" class="form-control" placeholder="Your last name...">
												</div>
											</div>
		
										</div>
	
										<div class="form-group">
                                            <label for="address">Full Address <abbr class="required" title="required">*</abbr></label>
											<input type="text" name="address" id="address" class="form-control" placeholder="Enter your apartment, floor, suite, etc...">
										</div>
									    <div class="form-group">
											<label for="country">Country</label>
											<select name="country" id="country" class="form-control selectpicker countrypicker" data-live-search="true">
											</select>
										</div>  
		
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="address">State <abbr class="required" title="required">*</abbr></label>
													<input type="text" name="state" id="state" class="form-control" placeholder="Enter your State">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="zip">Zip Code</label>
													<input type="text" name="zip" id="zip" class="form-control" placeholder="Your zip or postal code...">
												</div>
											</div>
										</div>
									</div>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            
                                                <a class="btn btn-outline-dark btn-block"  href="{{ route('login') }}">{{ __('Login?') }}</a>
                                                
                                        </div>
                                        <div class='col-md-6'>
                                            
                                                <button type='submit' class="btn btn-success btn-block">{{ __('Register') }}</button>
                                            
                                        </div>
                                    </div>
								</form>
								<!-- Register Form / End -->
		
				

								
							</div>
						</div>
						<!-- Register / End -->
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
<script src="{{asset('country/dependancies/bootstrap-select-1.12.4/dist/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('country/countrypicker.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>