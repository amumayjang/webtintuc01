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
					<strong>Welcome to Us!</strong>
				</div>
				<div class="col-md-6">
					<ul class="list-inline top-link link">
						<li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
						<li><a href="contact.html"><i class="fa fa-comments"></i> Contact</a></li>
						<li><a href="#"><i class="fa fa-question-circle"></i> FAQ</a></li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	
	<!--Navigation-->
    <nav id="menu" class="navbar container">
		<div class="navbar-header">
			<button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
			<a class="navbar-brand" href="#">
				<div class="logo"><span>Newspaper</span></div>
			</a>
		</div>
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.html">Home</a></li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <i class="fa fa-arrow-circle-o-down"></i></a>
					<div class="dropdown-menu">
						<div class="dropdown-inner">
							<ul class="list-unstyled">
								<li><a href="archive.html">Login</a></li>
								<li><a href="archive.html">Register</a></li>
							</ul>
						</div>
					</div>
				</li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Video <i class="fa fa-arrow-circle-o-down"></i></a>
					<div class="dropdown-menu">
						<div class="dropdown-inner">
							<ul class="list-unstyled">
								<li><a href="archive.html">Text 201</a></li>
								<li><a href="archive.html">Text 202</a></li>
								<li><a href="archive.html">Text 203</a></li>
								<li><a href="archive.html">Text 204</a></li>
								<li><a href="archive.html">Text 205</a></li>
							</ul>
						</div> 
					</div>
				</li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Category <i class="fa fa-arrow-circle-o-down"></i></a>
					<div class="dropdown-menu" style="margin-left: -203.625px;">
						<div class="dropdown-inner">
							<ul class="list-unstyled">
								<li><a href="archive.html">Text 301</a></li>
								<li><a href="archive.html">Text 302</a></li>
								<li><a href="archive.html">Text 303</a></li>
								<li><a href="archive.html">Text 304</a></li>
								<li><a href="archive.html">Text 305</a></li>
							</ul>
							<ul class="list-unstyled">
								<li><a href="archive.html">Text 306</a></li>
								<li><a href="archive.html">Text 307</a></li>
								<li><a href="archive.html">Text 308</a></li>
								<li><a href="archive.html">Text 309</a></li>
								<li><a href="archive.html">Text 310</a></li>
							</ul>
							<ul class="list-unstyled">
								<li><a href="archive.html">Text 311</a></li>
								<li><a href="archive.html">Text 312</a></li>
								<li><a href="archive.html#">Text 313</a></li>
								<li><a href="archive.html#">Text 314</a></li>
								<li><a href="archive.html">Text 315</a></li>
							</ul>
						</div>
					</div>
				</li>
				<li><a href="archive.html"><i class="fa fa-cubes"></i> Blocks</a></li>
				<li><a href="contact.html"><i class="fa fa-envelope"></i> Contact</a></li>
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
		<div class="wrap-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-footer footer-1">
						<div class="footer-heading"><h1><span style="color: #fff;">NEWSPAPER</span></h1></div>
						<div class="content">
							<p>Never missed any post published in our site. Subscribe to our daly newsletter now.</p>
							<strong>Email address:</strong>
							<form action="#" method="post">
								<input type="text" name="your-name" value="" size="40" placeholder="Your Email" />
								<input type="submit" value="SUBSCRIBE" class="btn btn-3" />
							</form>
						</div>
					</div>
					<div class="col-md-4 col-footer footer-2">
						<div class="footer-heading"><h4>Tags</h4></div>
						<div class="content">
							<a href="#">animals</a>
							<a href="#">cooking</a>
							<a href="#">countries</a>
							<a href="#">city</a>
							<a href="#">children</a>
							<a href="#">home</a>
							<a href="#">likes</a>
							<a href="#">photo</a>
							<a href="#">link</a>
							<a href="#">law</a>
							<a href="#">shopping</a>
							<a href="#">skate</a>
							<a href="#">scholl</a>
							<a href="#">video</a>
							<a href="#">travel</a>
							<a href="#">images</a>
							<a href="#">love</a>
							<a href="#">lists</a>
							<a href="#">makeup</a>
							<a href="#">media</a>
							<a href="#">password</a>
							<a href="#">pagination</a>
							<a href="#">wildlife</a>
						</div>
					</div>
					<div class="col-md-4 col-footer footer-3">
						<div class="footer-heading"><h4>Link List</h4></div>
						<div class="content">
							<ul>
								<li><a href="#">MOST VISITED COUNTRIES</a></li>
								<li><a href="#">5 PLACES THAT MAKE A GREAT HOLIDAY</a></li>
								<li><a href="#">PEBBLE TIME STEEL IS ON TRACK TO SHIP IN JULY</a></li>
								<li><a href="#">STARTUP COMPANY’S CO-FOUNDER TALKS ON HIS NEW PRODUCT</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="copy-right">
			<p>Copyright 2015 - <a href="http://www.365bootstrap.com" target="_blank" rel="nofollow">Bootstrap Themes</a> Designed by 365Bootstrap.com</p>
		</div>
	</footer>
	<!-- Footer -->
	
	<!-- JS -->
	<script src="{{ url('public/owl-carousel/owl.carousel.js') }}"></script>
	@yield('script')
</body>
</html>
