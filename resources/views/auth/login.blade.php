<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="description" content="">
		<meta name="author" content="">

		<!-- Title -->
		<title>Neptune</title>

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{asset('css/vendor/bootstrap/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('css/vendor/themify-icons/themify-icons.css')}}">
		<link rel="stylesheet" href="{{asset('css/vendor/font-awesome/css/font-awesome.min.css')}}">

		<!-- Neptune CSS -->
		<link rel="stylesheet" href="{{asset('css/core.css')}}">

		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="auth-bg">
		
		<div class="auth">
			<div class="auth-header">
{{--				<h1>Pinnacle</h1>--}}
				<img src="{{asset('img/img1.png')}}" alt="">
				<h6>Welcome! Sign in to access the admin panel !!</h6>
                <div class="col-md-4 offset-md-4">
               @include('partials._message')
            </div>
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4 offset-md-4">
						<form action="{{route('admin.login')}}" method="post">
                        @csrf
							<div class="form-group">
								<div class="input-group">
									<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{old('email')}}">
									<div class="input-group-addon"><i class="ti-email"></i></div>
								</div>
							</div>
							<div class="form-group">
								<div class="input-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="Password">
									<div class="input-group-addon"><i class="ti-key"></i></div>
								</div>
							</div>
							<div class="form-group clearfix">
								<div class="pull-xs-left">
									<label class="custom-control custom-checkbox">
										<input type="checkbox" class="custom-control-input">
										<span class="custom-control-indicator"></span>
										<span class="custom-control-description font-90">Remember me</span>
									</label>
								</div>
								<div class="pull-xs-right">
									<a class="text-white font-90" href="#">Forgot password?</a>
								</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-danger btn-block">Sign in</button>
							</div>
						</form>
						<div class="row">
							<div class="col-xs-6">
								<button type="button" class="btn bg-facebook btn-block label-left m-b-0-25">
									<span class="btn-label"><i class="ti-facebook"></i></span>
									Facebook
								</button>
							</div>
							<div class="col-xs-6">
								<button type="button" class="btn bg-twitter btn-block label-left m-b-0-25">
									<span class="btn-label"><i class="ti-twitter"></i></span>
									Twitter
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Vendor JS -->
		<script type="text/javascript" src="{{asset('css/vendor/jquery/jquery-1.12.3.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('css/vendor/tether/js/tether.min.js')}}"></script>
		<script type="text/javascript" src="{{asset('css/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	</body>
</html>