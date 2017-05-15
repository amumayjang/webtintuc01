@extends('master')
@section('content')
	<div class="featured container">
		<div class="row">
			<div class="col-sm-8">
				<!-- Carousel -->
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
					<ol class="carousel-indicators">
						<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
						<li data-target="#carousel-example-generic" data-slide-to="1"></li>
						<li data-target="#carousel-example-generic" data-slide-to="2"></li>
					</ol>
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
					<?php $check = true; ?>
					@if (count($newPosts) > 0)
					@foreach ($newPosts as $newPost)
						<div class="item 
							@if($check == true)
								active
								<?php $check = false; ?>
							@endif
						">
							<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$newPost->imgThumb) }}" alt="First slide">
							<!-- Static Header -->
							<div class="header-text hidden-xs">
								<div class="col-md-12 text-center">
									<a href="{{ asset('/'.$newPost->slug) }}"><h2>{{ $newPost->title }} </h2></a>
									<br>
									<h3>{{ $newPost->cate_name }}</h3>
									<br>
								</div>
							</div><!-- /header-text -->
						</div>
					@endforeach
					@endif
					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>
					<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
				</div><!-- /carousel -->
			</div>
			<div class="col-sm-4" >
				<div id="owl-demo-1" class="owl-carousel">
					@if (count($newPosts) > 0)
					@foreach ($newPosts as $newPost)
						<a href="{{ asset('/'.$newPost->slug) }}">
							<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$newPost->imgThumb) }}" />
						</a>
					@endforeach
					@endif
				</div>
				<a href="{{ asset('/'.$newPosts[0]->slug) }}">
					<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$newPosts[0]->imgThumb) }}" />
				</a>
			</div>
		</div>
	</div>
	
	<!-- /////////////////////////////////////////Content -->
	<div id="page-content" class="index-page container">
		<div class="row">
			<div id="main-content"><!-- background not working -->
				<div class="col-md-6">
					@if (count($newPosts) > 0)
					<div class="box wrap-vid">
						<div class="zoom-container">
							<div class="zoom-caption">
								<span class="youtube">{{ $newPosts->first()->cate_name }}</span>
								<a href="{{ asset('/'.$newPosts->first()->slug) }}"></a>
							</div>
							<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$newPosts->first()->imgThumb) }}" />
						</div>
						<h3 class="vid-name"><a href="{{ asset('/'.$newPosts->first()->slug) }}">{{ $newPosts->first()->title }}</a></h3>
						<div class="info">
							<h5>Đăng bởi <a href="#">{{ $newPosts->first()->name }}</a></h5>
							<span><i class="fa fa-calendar"></i>{{ $newPosts->first()->time_public }}</span> 
							<span><i class="fa fa-eye"></i>{{ $newPosts->first()->view }}</span>
						</div>
						<p class="more">{{ $newPosts->first()->description }}</p>
					</div>
					@endif
					<?php $firstCate = $postInCates[0] ?>
					@if (count($firstCate) > 0)
					<div class="box">
						<div class="box-header header-vimeo">
							<h2>{{ $firstCate->first()->cate_name }}</h2>
						</div>
						<div class="box-content">
							<div class="row">
								<div class="col-md-6">
									<div class="wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span class="vimeo">{{ $firstCate->first()->cate_name }}</span>
												<a href="{{ asset('/'.$firstCate->first()->slug) }}"></a>
											</div>
											<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$firstCate->first()->imgThumb) }}" />
										</div>
										<h3 class="vid-name"><a href="{{ asset('/'.$firstCate->first()->slug) }}">{{ $firstCate->first()->title }}</a></h3>
										<div class="info">
											<h5>Đăng bởi <a href="#">{{ $firstCate->first()->name }}</a></h5>
											<span><i class="fa fa-calendar"></i>{{ $firstCate->first()->time_public }}</span> 
											<span><i class="fa fa-eye"></i>{{ $firstCate->first()->view }}</span>
										</div>
									</div>
									<p class="more">{{ $firstCate->first()->description }}</p>
								</div>
								<div class="col-md-6">
								<?php $check = false; ?>
									@foreach ($firstCate as $item)
									@if ($check == true)
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span class="vimeo">{{ $item->cate_name }}</span>
												<a href="{{ asset('/'.$item->slug) }}"></a>
											</div>
											<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$item->imgThumb) }}" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">{{ $item->title }}</a></h5>
											<div class="info">
												<h6>Đăng bởi: <a href="#">{{ $item->name }}</a></h6>
												<span><i class="fa fa-eye"></i>{{ $item->view }} / <i class="fa fa-calendar"></i>{{ $item->time_public }}</span>
												<span class="rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-half"></i>
												</span>
											</div>
										</div>
									</div>
									@endif
									<?php $check = true; ?>
									@endforeach
								</div>
							</div>
						</div>
					</div>
					@endif
					<div class="box">
						<div class="box-header header-photo">
							<h2>Photos</h2>
						</div>
						<div class="box-content">
							<div id="owl-demo-2" class="owl-carousel">
								<div class="item">
									<img src="images/1.jpg" />
									<img src="images/2.jpg" />
								</div>
								<div class="item">
									<img src="images/3.jpg" />
									<img src="images/5.jpg" />
								</div>
								<div class="item">
									<img src="images/8.jpg" />
									<img src="images/9.jpg" />
								</div>
								<div class="item">
									<img src="images/10.jpg" />
									<img src="images/11.jpg" />
								</div>
								<div class="item">
									<img src="images/12.jpg" />
									<img src="images/13.jpg" />
								</div>
							</div>
						</div>
					</div>
					<?php $secondCate = $postInCates[1] ?>
					@if (count($secondCate) > 0)
					<div class="box">
						<div class="box-header header-natural">
							<h2>{{ $secondCate->first()->cate_name }}</h2>
						</div>
						<div class="box-content">
							<div class="row">
								@foreach ($secondCate as $item)
								<div class="col-md-6">
									<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$item->imgThumb) }}" />
									<h3><a href="{{ asset('/'.$item->slug) }}">{{ $item->title }}</a></h3>
									<span><i class="fa fa-calendar"></i> {{ $item->time_public }} / <i class="fa fa-eye"></i> {{ $item->view }} / <i class="fa fa-comment-o"></i> 10 </span>
									<p class="rating">
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star"></i>
										<i class="fa fa-star-half"></i>
									</p>
									<p>{{ $item->description }}</p>
								</div>
								@endforeach
							</div>
						</div>
					</div>
					@endif
				</div>
			</div>
			<div id="sidebar">
				<div class="col-md-3">
					<!---- Start Widget ---->
					<div class="widget wid-vid">
						<div class="heading">
							<h4>Tin tức</h4>
						</div>
						<div class="content">
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#most">Được quan tâm</a></li>
								<li><a data-toggle="tab" href="#popular">Nhiều ý kiến</a></li>
							</ul>
							<div class="tab-content">
								<div id="most" class="tab-pane fade in active">
									@if (count($postPopular))
									@foreach ($postPopular as $item)
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span class="youtube">{{ $item->cate_name }}</span>
												<a href="{{ asset('/'.$item->slug) }}"></a>
											</div>
											<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$item->imgThumb) }}" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="{{ asset('/'.$item->slug) }}">{{ $item->title }}</a></h5>
											<div class="info">
												<h6>Đăng bởi: <a href="#">{{ $item->name }}</a></h6>
												<span><i class="fa fa-eye"></i>{{ $item->view }} / <i class="fa fa-calendar"></i>{{ $item->time_public }}</span>
												<span class="rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-half"></i>
												</span>
											</div>
										</div>
									</div>
									@endforeach
									@endif
								</div>
								<div id="popular" class="tab-pane fade">
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span class="youtube">Youtube</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-3x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="images/4.jpg" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">Video's Name</a></h5>
											<div class="info">
												<h6>By <a href="#">Kelvin</a></h6>
												<span><i class="fa fa-heart"></i>1,200 / <i class="fa fa-calendar"></i>25/3/2015</span>
												<span class="rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-half"></i>
												</span>
											</div>
										</div>
									</div>
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span class="youtube">Youtube</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-3x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="images/4.jpg" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">Video's Name</a></h5>
											<div class="info">
												<h6>By <a href="#">Kelvin</a></h6>
												<span><i class="fa fa-heart"></i>1,200 / <i class="fa fa-calendar"></i>25/3/2015</span>
												<span class="rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-half"></i>
												</span>
											</div>
										</div>
									</div>
									<div class="post wrap-vid">
										<div class="zoom-container">
											<div class="zoom-caption">
												<span class="vimeo">Vimeo</span>
												<a href="single.html">
													<i class="fa fa-play-circle-o fa-3x" style="color: #fff"></i>
												</a>
												<p>Video's Name</p>
											</div>
											<img src="images/4.jpg" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="#">Video's Name</a></h5>
											<div class="info">
												<h6>By <a href="#">Kelvin</a></h6>
												<span><i class="fa fa-heart"></i>1,200 / <i class="fa fa-calendar"></i>25/3/2015</span>
												<span class="rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-half"></i>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!---- Start Widget ---->
					<div class="widget wid-new-post">
						<div class="heading"><h4>Bài viết mới</h4></div>
						<div class="content">
							@if (count($newPosts) > 0)
							@foreach ($newPosts as $item)
							<h6><a href="{{ asset('/'.$item->slug) }}">{{ $item->title }}</a></h6>
							<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$item->imgThumb) }}" />
							<ul class="list-inline">
								<li><i class="fa fa-calendar"></i> {{ $item->time_public }}</li> 
								<li><i class="fa fa-eye"></i> {{ $item->view }}</li>
							</ul>
							<p>{{ $item->description }}...</p>
							@endforeach
							@endif
						</div>
					</div>
					<!---- Start Widget ---->
					<div class="widget wid-recent-post">
						<div class="heading"><h4>Thăm dò ý kiến</h4></div>
						<div class="content">
							<span>Creativity is about the journey <a href="#">your mind takes</a></span>
							<span>About the journey <a href="#">your mind</a></span>
							<span>The journey <a href="#">your</a></span>
							<span>Journey is about the journey <a href="#">your mind mind</a></span>
							<span>Creativity is about the journey <a href="#">your mind takes</a></span>
							<span>About the journey <a href="#">your mind</a></span>
							
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<!---- Start Widget ---->
					<div class="widget wid-tags">
						<div class="heading"><h4>Search</h4></div>
						<div class="content">
							<form role="form" class="form-horizontal" method="post" action="">
								<input type="text" placeholder="Enter Search Keywords" value="" name="v_search" id="v_search" class="form-control">
							</form>
						</div>
					</div>
					<!---- Start Widget ---->
					<div class="widget wid-comment">
						<div class="heading"><h4>Bình luận mới</h4></div>
						<div class="content">
							@if (count($newComments) > 0)
							@foreach ($newComments as $item)
							<div class="post">
								<a href="single.html">
									<img src="{{ asset('public/admin/uploads/images/avatars/'.$item->avatar) }}" class="img-circle"/>
								</a>
								<div class="wrapper">
									<a href="{{ asset('/'.$item->slug) }}"><h5>{{ $item->content_cmt }}</h5></a>
								</div>
							</div>
							@endforeach
							@endif
						</div>
					</div>
					<!---- Start Widget ---->
					<div class="widget wid-categoty">
						<div class="heading"><h4>Danh mục</h4></div>
						<div class="content">
							<select class="col-md-12">
								@php
								show_cates($cateAll)
								@endphp
							</select>
						</div>
					</div>
					<!---- Start Widget ---->
					<div class="widget wid-calendar">
						<div class="heading"><h4>Calendar</h4></div>
						<div class="content">
							<center><form action="" role="form">        
								<div class="">
									<div class="input-group date form_date" data-date="" data-date-format="dd MM yyyy" data-link-field="dtp_input2" data-link-format="yyyy-mm-dd">                </div>
									<input type="hidden" id="dtp_input2" value="" /><br/>
								</div>
							</form></center>
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
	      $("#owl-demo-1").owlCarousel({
	        autoPlay: 3000,
	        items : 1,
	        itemsDesktop : [1199,1],
	        itemsDesktopSmall : [400,1]
	      });
		  $("#owl-demo-2").owlCarousel({
	        autoPlay: 3000,
	        items : 3,
	        
	      });
	    });
    </script>
	<script type="text/javascript" src="{{ url('public/js/bootstrap-datetimepicker.js') }}" charset="UTF-8"></script>
	<script type="text/javascript" src="{{ url('public/js/locales/bootstrap-datetimepicker.fr.js') }}" charset="UTF-8"></script>
	<script type="text/javascript">
	    $('.form_datetime').datetimepicker({
	        //language:  'fr',
	        weekStart: 1,
	        todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			forceParse: 0,
	        showMeridian: 1
	    });
		$('.form_date').datetimepicker({
	        language:  'fr',
	        weekStart: 1,
	        todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 2,
			minView: 2,
			forceParse: 0
	    });
		$('.form_time').datetimepicker({
	        language:  'fr',
	        weekStart: 1,
	        todayBtn:  1,
			autoclose: 1,
			todayHighlight: 1,
			startView: 1,
			minView: 0,
			maxView: 1,
			forceParse: 0
	    });
	</script>
@endsection
