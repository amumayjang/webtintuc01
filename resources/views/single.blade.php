@extends('master')
@section('content')
	<div class="featured container">
		<div id="owl-demo" class="owl-carousel">
			<div class="item">
				<div class="zoom-container">
					<div class="zoom-caption">
						<span>Youtube</span>
						<a href="single.html">
							<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
						</a>
						<p>Video's Name</p>
					</div>
					<img src="images/1.jpg" />
				</div>
			</div>
			<div class="item">
				<div class="zoom-container">
					<div class="zoom-caption">
						<span>Youtube</span>
						<a href="single.html">
							<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
						</a>
						<p>Video's Name</p>
					</div>
					<img src="images/2.jpg" />
				</div>
			</div>
			<div class="item">
				<div class="zoom-container">
					<div class="zoom-caption">
						<span>Youtube</span>
						<a href="single.html">
							<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
						</a>
						<p>Video's Name</p>
					</div>
					<img src="images/3.jpg" />
				</div>
			</div>
			<div class="item">
				<div class="zoom-container">
					<div class="zoom-caption">
						<span>Youtube</span>
						<a href="single.html">
							<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
						</a>
						<p>Video's Name</p>
					</div>
					<img src="images/8.jpg" />
				</div>
			</div>
			<div class="item">
				<div class="zoom-container">
					<div class="zoom-caption">
						<span>Youtube</span>
						<a href="single.html">
							<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
						</a>
						<p>Video's Name</p>
					</div>
					<img src="images/9.jpg" />
				</div>
			</div>
			<div class="item">
				<div class="zoom-container">
					<div class="zoom-caption">
						<span>Youtube</span>
						<a href="single.html">
							<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
						</a>
						<p>Video's Name</p>
					</div>
					<img src="images/10.jpg" />
				</div>
			</div>
			<div class="item">
				<div class="zoom-container">
					<div class="zoom-caption">
						<span>Youtube</span>
						<a href="single.html">
							<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
						</a>
						<p>Video's Name</p>
					</div>
					<img src="images/11.jpg" />
				</div>
			</div>
			<div class="item">
				<div class="zoom-container">
					<div class="zoom-caption">
						<span>Youtube</span>
						<a href="single.html">
							<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
						</a>
						<p>Video's Name</p>
					</div>
					<img src="images/12.jpg" />
				</div>
			</div>
		</div>
	</div>
	<!-- Header -->
	
	<!-- /////////////////////////////////////////Content -->
	<div id="page-content" class="single-page container">
		<div class="row">
			<div id="main-content" class="col-md-8">
				<div class="box">
					<div class="wrap-vid">
						<iframe width="100%" height="400" src="https://www.youtube.com/embed/ImMw_5byGmA" frameborder="0" allowfullscreen></iframe>
					</div>
					<div class="share">
						<ul class="list-inline center">
							<li><a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i> Share</a></li>
							<li><a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i> Tweet</a></li>
							<li><a href="#" class="btn btn-pinterest"><i class="fa fa-pinterest"></i> Tweet</a></li>
							<li><a href="#" class="btn btn-google"><i class="fa fa-google-plus-square"></i> Google+</a></li>
							<li><a href="#" class="btn btn-mail"><i class="fa fa-envelope-o"></i> E-mail</a></li>
						</ul>
					</div>
					<div class="line"></div>
					<h1 class="vid-name"><a href="#">Video's Name</a></h1>
					<div class="info">
						<h5>By <a href="#">Kelvin</a></h5>
						<span><i class="fa fa-calendar"></i>25/3/2015</span> 
						<span><i class="fa fa-heart"></i>1,200</span>
					</div>
					<p style="margin-top: 20px">Aenean feugiat in ante et blandit. Vestibulum posuere molestie risus, ac interdum magna porta non. Pellentesque rutrum fringilla elementum. Curabitur tincidunt porta lorem vitae accumsan. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec ac euismod turpis.Aenean feugiat in ante et blandit. Vestibulum posuere molestie risus, ac interdum magna porta non. Pellentesque rutrum fringilla elementum. Curabitur tincidunt porta lorem vitae accumsan. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec ac euismod turpis.</p>
					<h4>Heading</h4>
					<p style="margin-top: 20px">Aenean feugiat in ante et blandit. Vestibulum posuere molestie risus, ac interdum magna porta non. Pellentesque rutrum fringilla elementum. Curabitur tincidunt porta lorem vitae accumsan. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec ac euismod turpis.</p>
					<div class="vid-tags">
						<a href="#">Animal</a>
						<a href="#">Aenean</a>
						<a href="#">Feugiat</a>
						<a href="#">Risus</a>
						<a href="#">Magna</a>
					</div>
					<div class="line"></div>
					<div class="comment">
						<h3>Leave A Comment</h3>
						<form name="form1" method="post" action="">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<input type="text" class="form-control input-lg" name="name" id="name" placeholder="Enter name" required="required" />
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<input type="email" class="form-control input-lg" name="email" id="email" placeholder="Enter email" required="required" />
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<textarea name="message" id="message" class="form-control" rows="4" cols="25" required="required"
										placeholder="Message"></textarea>
									</div>						
									<button type="submit" class="btn btn-4 btn-block" name="btnBooking" id="btnBbooking">
								Book Now</button>
								</div>
							</div>
						</form>
					</div>
				</div>
				
				<div class="box">
					<div class="box-header header-natural">
						<h2>RELATED VIDEOS</h2>
					</div>
					<div class="box-content">
						<div class="row">
							<div class="col-md-4">
								<div class="wrap-vid">
									<div class="zoom-container">
										<div class="zoom-caption">
											<span>Youtube</span>
											<a href="single.html">
												<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
											</a>
											<p>Video's Name</p>
										</div>
										<img src="images/2.jpg" />
									</div>
									<h3 class="vid-name"><a href="#">Video's Name</a></h3>
									<div class="info">
										<h5>By <a href="#">Kelvin</a></h5>
										<span><i class="fa fa-calendar"></i>25/3/2015</span> 
										<span><i class="fa fa-heart"></i>1,200</span>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="wrap-vid">
									<div class="zoom-container">
										<div class="zoom-caption">
											<span>Youtube</span>
											<a href="single.html">
												<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
											</a>
											<p>Video's Name</p>
										</div>
										<img src="images/2.jpg" />
									</div>
									<h3 class="vid-name"><a href="#">Video's Name</a></h3>
									<div class="info">
										<h5>By <a href="#">Kelvin</a></h5>
										<span><i class="fa fa-calendar"></i>25/3/2015</span> 
										<span><i class="fa fa-heart"></i>1,200</span>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="wrap-vid">
									<div class="zoom-container">
										<div class="zoom-caption">
											<span>Youtube</span>
											<a href="single.html">
												<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
											</a>
											<p>Video's Name</p>
										</div>
										<img src="images/2.jpg" />
									</div>
									<h3 class="vid-name"><a href="#">Video's Name</a></h3>
									<div class="info">
										<h5>By <a href="#">Kelvin</a></h5>
										<span><i class="fa fa-calendar"></i>25/3/2015</span> 
										<span><i class="fa fa-heart"></i>1,200</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="sidebar" class="col-md-4">
				<!---- Start Widget ---->
				<div class="widget wid-follow">
					<div class="heading"><h4>Follow Us</h4></div>
					<div class="content">
						<ul class="list-inline">
							<li>
								<a href="facebook.com/">
									<div class="box-facebook">
										<span class="fa fa-facebook fa-2x icon"></span>
										<span>1250</span>
										<span>Fans</span>
									</div>
								</a>
							</li>
							<li>
								<a href="facebook.com/">
									<div class="box-twitter">
										<span class="fa fa-twitter fa-2x icon"></span>
										<span>1250</span>
										<span>Fans</span>
									</div>
								</a>
							</li>
							<li>
								<a href="facebook.com/">
									<div class="box-google">
										<span class="fa fa-google-plus fa-2x icon"></span>
										<span>1250</span>
										<span>Fans</span>
									</div>
								</a>
							</li>
						</ul>
						<img src="images/banner.jpg" />
					</div>
				</div>
				<!---- Start Widget ---->
				<div class="widget wid-post">
					<div class="heading"><h4>Category</h4></div>
					<div class="content">
						<div class="post wrap-vid">
							<div class="zoom-container">
								<div class="zoom-caption">
									<span>Youtube</span>
									<a href="single.html">
										<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
									</a>
									<p>Video's Name</p>
								</div>
								<img src="images/1.jpg" />
							</div>
							<div class="wrapper">
								<h5 class="vid-name"><a href="#">Video's Name</a></h5>
								<div class="info">
									<h6>By <a href="#">Kelvin</a></h6>
									<span><i class="fa fa-calendar"></i>25/3/2015</span> 
									<span><i class="fa fa-heart"></i>1,200</span>
								</div>
							</div>
						</div>
						<div class="post wrap-vid">
							<div class="zoom-container">
										<div class="zoom-caption">
											<span>Youtube</span>
											<a href="single.html">
												<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
											</a>
											<p>Video's Name</p>
										</div>
										<img src="images/2.jpg" />
									</div>
							<div class="wrapper">
								<h5 class="vid-name"><a href="#">Video's Name</a></h5>
								<div class="info">
									<h6>By <a href="#">Kelvin</a></h6>
									<span><i class="fa fa-calendar"></i>25/3/2015</span> 
									<span><i class="fa fa-heart"></i>1,200</span>
								</div>
							</div>
						</div>
						<div class="post wrap-vid">
							<div class="zoom-container">
								<div class="zoom-caption">
									<span>Youtube</span>
									<a href="single.html">
										<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
									</a>
									<p>Video's Name</p>
								</div>
								<img src="images/3.jpg" />
							</div>
							<div class="wrapper">
								<h5 class="vid-name"><a href="#">Video's Name</a></h5>
								<div class="info">
									<h6>By <a href="#">Kelvin</a></h6>
									<span><i class="fa fa-calendar"></i>25/3/2015</span> 
									<span><i class="fa fa-heart"></i>1,200</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!---- Start Widget ---->
				<div class="widget ">
					<div class="heading"><h4>Top News</h4></div>
					<div class="content">
						<div class="wrap-vid">
							<div class="zoom-container">
								<div class="zoom-caption">
									<span>Youtube</span>
									<a href="single.html">
										<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
									</a>
									<p>Video's Name</p>
								</div>
								<img src="images/1.jpg" />
							</div>
							<h3 class="vid-name"><a href="#">Video's Name</a></h3>
							<div class="info">
								<h5>By <a href="#">Kelvin</a></h5>
								<span><i class="fa fa-calendar"></i>25/3/2015</span> 
								<span><i class="fa fa-heart"></i>1,200</span>
							</div>
						</div>
						<div class="wrap-vid">
							<div class="zoom-container">
								<div class="zoom-caption">
									<span>Youtube</span>
									<a href="single.html">
										<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
									</a>
									<p>Video's Name</p>
								</div>
								<img src="images/2.jpg" />
							</div>
							<h3 class="vid-name"><a href="#">Video's Name</a></h3>
							<div class="info">
								<h5>By <a href="#">Kelvin</a></h5>
								<span><i class="fa fa-calendar"></i>25/3/2015</span> 
								<span><i class="fa fa-heart"></i>1,200</span>
							</div>
						</div>
						<div class="wrap-vid">
							<div class="zoom-container">
								<div class="zoom-caption">
									<span>Youtube</span>
									<a href="single.html">
										<i class="fa fa-play-circle-o fa-5x" style="color: #fff"></i>
									</a>
									<p>Video's Name</p>
								</div>
								<img src="images/3.jpg" />
							</div>
							<h3 class="vid-name"><a href="#">Video's Name</a></h3>
							<div class="info">
								<h5>By <a href="#">Kelvin</a></h5>
								<span><i class="fa fa-calendar"></i>25/3/2015</span> 
								<span><i class="fa fa-heart"></i>1,200</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('script')
    <script>
	    $(document).ready(function() {
	      $("#owl-demo").owlCarousel({
	        autoPlay: 3000,
	        items : 5,
	        itemsDesktop : [1199,4],
	        itemsDesktopSmall : [979,4]
	      });

	    });
    </script>
@endsection
