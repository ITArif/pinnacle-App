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
		<title>@yield('title')</title>
        @include('partials._css')
	</head>
	<body class="large-sidebar fixed-sidebar fixed-header skin-1">
		<div class="wrapper">

			<!-- Preloader -->
			<div class="preloader"></div>

			<!-- Sidebar -->
			
            <!-- End Sidebar -->
			@include('partials._first_sidebar')
			<!-- Sidebar second -->
			@include('partials._seconde_sidebar')
            <!-- End second sidebar -->

			<!-- Template options -->
			<div class="template-options custom-scroll custom-scroll-dark">
				<div class="to-toggle"><i class="ti-settings"></i></div>
				<div class="to-content">
					<h6>Layouts</h6>
					<div class="row m-b-2 text-xs-center">
						<div class="col-xs-6 m-b-2">
							<a href="index.html">
								<img src="{{asset('img/layouts/1.png')}}" class="img-fluid">
							</a>
							<div class="text-muted">Default</div>
						</div>
						<div class="col-xs-6 m-b-2">
							<label>
								<input name="compact-sidebar" type="checkbox">
								<div class="to-icon"><i class="ti-check"></i></div>
								<img src="{{asset('img/layouts/2.png')}}" class="img-fluid">
							</label>
							<div class="text-muted">Compact Sidebar</div>
						</div>
						<div class="col-xs-6 m-b-2">
							<label>
								<input name="fixed-header" type="checkbox" checked>
								<div class="to-icon"><i class="ti-check"></i></div>
								<img src="{{asset('img/layouts/3.png')}}" class="img-fluid">
							</label>
							<div class="text-muted">Fixed Header</div>
						</div>
						<div class="col-xs-6 m-b-2">
							<label>
								<input name="boxed-wrapper" type="checkbox">
								<div class="to-icon"><i class="ti-check"></i></div>
								<img src="{{asset('img/layouts/4.png')}}" class="img-fluid">
							</label>
							<div class="text-muted">Boxed Wrapper</div>
						</div>
					</div>
					<h6>Skins</h6>
					<div class="row">
						<div class="col-xs-3 m-b-2">
							<label>
								<input name="skin" value="skin-default" type="radio">
								<div class="to-icon"><i class="ti-check"></i></div>
								<div class="to-skin">
									<span class="skin-first bg-white"></span>
									<span class="skin-second skin-dark-blue"></span>
									<span class="skin-third bg-info"></span>
								</div>
							</label>
						</div>
						<div class="col-xs-3 m-b-2">
							<label>
								<input name="skin" value="skin-1" type="radio" checked>
								<div class="to-icon"><i class="ti-check"></i></div>
								<div class="to-skin">
									<span class="skin-first skin-dark-blue-2"></span>
									<span class="skin-second bg-white"></span>
									<span class="skin-third bg-danger"></span>
								</div>
							</label>
						</div>
						<div class="col-xs-3 m-b-2">
							<label>
								<input name="skin" value="skin-2" type="radio">
								<div class="to-icon"><i class="ti-check"></i></div>
								<div class="to-skin">
									<span class="skin-first bg-white"></span>
									<span class="skin-second bg-black"></span>
									<span class="skin-third bg-success"></span>
								</div>
							</label>
						</div>
						<div class="col-xs-3 m-b-2">
							<label>
								<input name="skin" value="skin-3" type="radio">
								<div class="to-icon"><i class="ti-check"></i></div>
								<div class="to-skin">
									<span class="skin-first bg-white"></span>
									<span class="skin-second skin-grey"></span>
									<span class="skin-third bg-purple"></span>
								</div>
							</label>
						</div>
						<div class="col-xs-3 m-b-2">
							<label>
								<input name="skin" value="skin-4" type="radio">
								<div class="to-icon"><i class="ti-check"></i></div>
								<div class="to-skin">
									<span class="skin-first skin-dark-blue"></span>
									<span class="skin-second skin-dark-blue-2"></span>
									<span class="skin-third bg-warning"></span>
								</div>
							</label>
						</div>
						<div class="col-xs-3 m-b-2">
							<label>
								<input name="skin" value="skin-5" type="radio">
								<div class="to-icon"><i class="ti-check"></i></div>
								<div class="to-skin">
									<span class="skin-first bg-primary"></span>
									<span class="skin-second bg-white"></span>
									<span class="skin-third bg-primary"></span>
								</div>
							</label>
						</div>
					</div>
				</div>
			</div>

			<!-- Header -->
			@include('partials._header')

			<div class="site-content">
				<!-- Content -->
				@yield('container')
                <!-- End content -->
				<!-- Footer -->
				@include('partials._footer')
                <!-- End footer -->
			</div>

		</div>

		<!-- Vendor JS -->
		@include('partials._script')
        <!-- End js -->
	</body>
</html>