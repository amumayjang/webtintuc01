@extends('master')
@section('content')
	<div class="featured container">
		<div id="owl-demo" class="owl-carousel">
			@for($i = 0; $i < 10; $i++)
				@if(isset($recentNews[$i]))
				<div class="item">
					<div class="zoom-container">
						<div class="zoom-caption">
							<span>{{ $recentNews[$i]->title }}</span>
							<a href="{{ asset('/'.$recentNews[$i]->slug) }}"></a>
						</div>
						<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$recentNews[$i]->imgThumb) }}" />
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
	<div id="page-content" class="single-page container">
		<div class="row">
			<div id="main-content" class="col-md-8">
				<div class="box">
					<div class="wrap-vid">
						<img width="100%" height="400" src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$news->imgThumb) }}">
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
					<h1 class="vid-name"><a href="{{ asset('/'.$news->slug) }}">{{ $news->title }}</a></h1>
					<div class="info">
						<h5>Đăng bởi: <a href="#">{{ $news->author()->first()->name }}</a></h5>
						<span><i class="fa fa-calendar"></i>{{ $news->time_public }}</span> 
						<span><i class="fa fa-eye"></i>1,200</span>
					</div>
					<p style="margin-top: 20px">{{ $news->description }}</p>
					<ul>
						@php
							relateNews($news->tags()->get(), $news->cate()->first(), 3)
						@endphp
					</ul>
					<p style="margin-top: 20px">{!! $news->content !!}</p>
					<div class="vid-tags">
						@foreach ($news->tags()->get() as $tag)
							<a href="#">{{ $tag->name_tag }}</a>
						@endforeach
					</div>
					<div class="line"></div>
					<div class="box-header header-natural">
						<h2>Bài viết liên quan</h2>
					</div>
					@for ($i = 0; $i < 3; $i++)
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
						</div>
					</div>
					@endfor
				</div>
				<div class="box">
					<div class="comment">
						<h3>Bình luận</h3>
						@if (Auth::user() !== null)
							<form name="form1" method="post" action="{{ route('postComment') }}">
								{{ csrf_field() }}
								<div class="row">
									<div class="col-md-12">
										<div 
										class="form-group">
											<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
											<input type="hidden" name="article_id" value="{{ $news->id }}">
											<textarea name="comment" id="comment-input" class="form-control" rows="4" cols="25" required="required"
											placeholder="Nội dung"></textarea>
										</div>						
										<button type="submit" class="btn btn-4 btn-block" name="btnBooking" id="btnBbooking">Gửi</button>
									</div>
								</div>
							</form>
						@else
							@if(count($errors) > 0)
				                <ul class="alert alert-danger alert-dismissable">
				                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
				                    @foreach ($errors->all() as $er)
				                        <li>{{ $er }}</li>
				                    @endforeach
				                </ul>
				            @endif
							<p>
								@if (Session::has('message'))
						            <div class="alert alert-warning">
						                {{ Session::get('message') }}
						            </div>
						        @endif
								Đăng nhập để bình luận
							</p>
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal">Đăng nhập</button>
							<button type="button" class="btn btn-success" data-toggle="modal" data-target="#signupModal">Đăng ký</button>
							<!-- login Modal -->
							<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							   <div class="modal-dialog" role="document">
							      <div class="modal-content">
							         <div class="modal-header">
							            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							            <h4 class="modal-title" id="myModalLabel">Đăng nhập</h4>
							         </div>
						         	<form class="form" action="{{ route('signIn') }}" method="post">
							         	<div class="modal-body">
								         		{{ csrf_field() }}
									            <div class="form-group">
									            	<input type="email" name="email" class="form-control" placeholder="Email">
									            </div>							            
									            <div class="form-group">
									            	<input type="password" name="password" class="form-control" placeholder="Password">
									            </div>
									            <div class="form-group">
									            	<input type="checkbox" name="remember" value="{{ csrf_token() }}">
									            	<span>Ghi nhớ đăng nhập?</span>
									            </div>
								         </div>
								         <div class="modal-footer">
								            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
								            <button type="submit" class="btn btn-primary">Đăng nhập</button>
								         </div>
							         </form>
							      </div>
							   </div>
							</div>
							<!-- signup Modal -->
							<div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							   <div class="modal-dialog" role="document">
							      <div class="modal-content">
							         <div class="modal-header">
							            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							            <h4 class="modal-title" id="myModalLabel">Đăng ký thành viên</h4>
							         </div>
						            <form class="form-horizontal" action="{{ route('signUp') }}" method="post">
						            	{{ csrf_field() }}
							         	<div class="modal-body">
											   	<div class="form-group">
											      	<label for="name" class="col-sm-2 control-label">Họ tên</label>
											      	<div class="col-sm-10">
											         	<input type="text" class="form-control" name="name" id="name" placeholder="Ví dụ: Lê Hữu Trường" required>
											      	</div>
											   	</div>
											   	<div class="form-group">
											      	<label for="email" class="col-sm-2 control-label">Email</label>
											      	<div class="col-sm-10">
											         	<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
											      	</div>
											   	</div>
											   	<div class="form-group">
											      	<label for="password" class="col-sm-2 control-label">Password</label>
											      	<div class="col-sm-10">
											         	<input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
											      	</div>
											   	</div>
											   	<div class="form-group">
											      	<label for="password" class="col-sm-2 control-label">Nhập lại password</label>
											      	<div class="col-sm-10">
											         	<input type="password" name="password_confirmation" class="form-control" id="password" placeholder="Password" required>
											      	</div>
											   	</div>
								         </div>
								         <div class="modal-footer">
								            <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
								            <button type="submit" class="btn btn-success">Đăng ký</button>
								         </div>
						            	}
									</form>
							      </div>
							   </div>
							</div>
						@endif
					</div>
				</div>
				<div class="box">
					<ul class="list-comments">
						@foreach ($comments as $cmt)
							<li>
								<div class="panel panel-default">
									<div class="panel panel-heading">
										{{ $cmt->user()->first()->name }}
									</div>
									<div class="panel panel-body">
										{{ $cmt->content_cmt }}
									</div>
									<div class="panel panel-footer">
										<a href="javascript:;" class="pull-right">Trả lời</a>
									</div>
								</div>
							</li>
						@endforeach
					</ul>
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
