<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
	
    <title>Newspaper | DK</title>
	
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="{{ url('public/css/bootstrap.min.css') }}"  type="text/css">
	
	<!-- Owl Carousel Assets -->
    <link href="{{ url('public/owl-carousel/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ url('public/owl-carousel/owl.theme.css') }}" rel="stylesheet">
	
	<!-- Custom CSS -->
    <link rel="stylesheet" href="{{ url('public/css/style.css') }}">
	 <link href="{{ url('public/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" media="screen">
	
	<!-- Custom Fonts -->
    <link rel="stylesheet" href="{{ url('public/fonts/font-awesome/css/font-awesome.min.css') }}"  type="text/css">

    <!-- my style edit -->
    <link rel="stylesheet" href="{{ url('public/css/mystyle.css') }}"  type="text/css">
	
	<!-- jQuery and Modernizr-->
	<script src="{{ url('public/js/jquery-2.1.1.js') }}"></script>
	
	<!-- Core JavaScript Files -->  	 
    <script src="{{ url('public/js/bootstrap.min.js') }}"></script>
    @yield('head')

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<header>
	<!--Top-->
	<nav id="top">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<strong>Chào mừng bạn đến với DK NEWS!</strong>
				</div>
				<div class="col-md-6">
					@if (Auth::user() !== null)
						<ul class="list-inline top-link link">
							<li><a href="#"> Xin chào {{ Auth::user()->name }}</a></li>
							<li><a href="{{ route('frontlogout') }}"> Thoát</a></li>
						</ul>
					@else
						<ul class="list-inline top-link link">
							<li><a href="{{ route('getSignIn') }}"> Đăng nhập</a></li>
							<li><a href="{{ route('getSignUp') }}"> Đăng ký</a></li>
						</ul>
					@endif
				</div>
			</div>
		</div>
	</nav>
	
	<!--Navigation-->
    <nav id="menu" class="navbar container">
		<div class="navbar-header">
			<button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
			<a class="navbar-brand" href="{{ asset('/') }}">
				<div class="logo"><span>DK News</span></div>
			</a>
		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="{{ asset('/') }}">Trang chủ</a></li>
				@php 
					$menu_lv_1 = DB::table('categories')->select('id', 'cate_name', 'parent_id', 'slug_cate')->where('parent_id', 0)->offset(1)->limit(7)->get();
			 	@endphp
			 	@foreach ($menu_lv_1 as $item_lv_1)
				<li class="dropdown"><a href="{{ asset('category/'.$item_lv_1->slug_cate) }}" class="dropdown-toggle">{{ $item_lv_1->cate_name }}</a>
				@php 
					$menu_lv_2 = DB::table('categories')->select('id', 'cate_name', 'parent_id', 'slug_cate')->where('parent_id', $item_lv_1->id)->get();
			 	@endphp
				@if (count($menu_lv_2) > 0)
					<div class="dropdown-menu">
						<div class="dropdown-inner">
							<ul class="list-unstyled">
								@foreach ($menu_lv_2 as $item_lv_2)
								<li><a href="{{ asset('category/'.$item_lv_2->slug_cate) }}">{{ $item_lv_2->cate_name }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>
				@endif
				</li>
				@endforeach
			</ul>
			<ul class="list-inline navbar-right top-social">
				<li><a href="#"><i class="fa fa-facebook"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter"></i></a></li>
				<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
				<li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
				<li><a href="#"><i class="fa fa-youtube"></i></a></li>
			</ul>
		</div>
	</nav>
</header>	
	@yield('content')

	<footer>
		<div class="copy-right">
			<p>Copyright 2017 - <a href="#" target="_blank" rel="nofollow">Credit by</a> DK</p>
		</div>
	</footer>
	<!-- Footer -->
	
	<!-- JS -->
	<script src="{{ url('public/owl-carousel/owl.carousel.js') }}"></script>
	<script src="{{ url('public/js/myscript.js') }}"></script>
	@yield('script')
</body>
</html>
