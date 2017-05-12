@extends('master')
@section('head')

@endsection
@section('content')
	<div class="featured container">
		<div id="owl-demo" class="owl-carousel">
			@for ($i = 0; $i < 10; $i++)
				@if(isset($newPost[$i]))
					<div class="item">
						<div class="zoom-container">
							<div class="zoom-caption">
								<span>Tin mới</span>
								<a href="{{ asset('/'.$newPost[$i]->slug) }}"></a>
							</div>
							<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$newPost[$i]->imgThumb) }}" />
						</div>
					</div>
				@else
					@break
				@endif
			@endfor
		</div>
	</div>
	<!-- Header -->
	
	<!-- /////////////////////////////////////////Content -->
	<div id="page-content" class="archive-page container">
		<div class="">
			<div class="row">
				<div id="main-content" class="col-md-8">
					<div class="box">
						<center><div class="box-header">
							<h1 class="center">Đăng ký tài khoản</h1>
						</div></center>
						<div class="box-content">
							@if(count($errors) > 0)
				                <ul class="alert alert-danger alert-dismissable">
				                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				                    @foreach ($errors->all() as $er)
				                        <li>{{ $er }}</li>
				                    @endforeach
				                </ul>
				            @endif
							<div id="contact_form">
								<form name="form1" id="ff" method="post" action="{{ route('signUp') }}">
									{{ csrf_field() }}
									<label>
									<span>Họ và tên</span>
									<input type="text"  name="name" id="name" required>
									</label>
									<label>
									<span>Email</span>
									<input type="email"  name="email" required>
									</label>
									<label>
									<span>Password</span>
									<input type="password"  name="password" required>
									</label>
									<label>
									<span>Nhập lại password</span>
									<input type="password"  name="password_confirmation" required>
									</label>
									<center><input class="sendButton" type="submit" name="Submit" value="Gửi đăng ký"></center>
								</form>
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
										<span class="youtube">Youtube</span>
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
												<span class="vimeo">Vimeo</span>
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
										<span class="youtube">Youtube</span>
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
										<span class="vimeo">Vimeo</span>
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
										<span class="vimeo">Vimeo</span>
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
										<span class="vimeo">Vimeo</span>
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
