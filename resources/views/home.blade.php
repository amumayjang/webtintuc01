@extends('master')
@section('content')
	<div class="featured container">
	<div class="row">
		<div class="col-sm-8">
			<div class="col-sm-7">
				<p>Đồng hồ</p>
				<div class="box-hot">
					<a href="{{ asset('/'.$news->first()->slug) }}">
						<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$news->first()->imgThumb) }}" height="245">
					</a>
					<h4>
						<a href="{{ asset('/'.$news->first()->slug) }}">{{ $news->first()->title }}</a>
					</h4>
					<p>
						{{ $news->first()->description }}
						<br>
						<ul>
							@php
								relateNews($news->first()->tags()->get(), $news->first()->cate()->first(), 3)
							@endphp
						</ul>
					</p>
				</div>
			</div>
			<div class="col-sm-5">
				<p class="label label-danger">Tin Hot</p>
				<ul class="hot-news">
					@foreach ($hotNews as $hotNew)
						<li>
							<a href="{{ asset('/'.$hotNew->slug) }}">{{ $hotNew->title }}</a>
						</li>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="col-sm-4" >
			<div class="col-sm-12">
				<a href="">
					<img src="{{ asset('public/images/1.jpg') }}">
				</a>
			</div>
			<div class="col-sm-12" style="margin-top: 20px">
				<a href="">
					<img src="{{ asset('public/images/2.jpg') }}">
				</a>
			</div>
		</div>
	</div>
</div>

<!-- /////////////////////////////////////////Content -->
<div id="page-content" class="index-page container">
	<div class="row">
		<div id="main-content"><!-- background not working -->
			<div class="col-md-6">
				<div class="box wrap-vid">
					<div class="box-header header-photo">
						<h2>{{ $newsHead->first()->cate()->first()->cate_name }}</h2>
					</div>
					<div class="zoom-container">
						<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$newsHead->first()->imgThumb) }}" />
					</div>
					<h3 class="vid-name"><a href="{{ asset('/'.$newsHead->first()->slug) }}">{{ $newsHead->first()->title }}</a></h3>
					<div class="info">
						<h5>Đăng bởi: <a href="#">{{ $newsHead->first()->author()->first()->name }}</a></h5>
						<span><i class="fa fa-calendar"></i>{{ $newsHead->first()->time_public }}</span> 
					</div>
					<p class="more">{{ $newsHead->first()->description }}</p>
					<ul>
						@php
							relateNews($newsHead->first()->tags()->get(), $newsHead->first()->cate()->first(), 3)
						@endphp
					</ul>
				</div>
				<div class="box">
					<div class="box-header header-vimeo">
						<h2>{{ $newsSecond->first()->cate()->first()->cate_name }}</h2>
					</div>
					<div class="box-content">
						<div class="row">
							<div class="col-md-6">
								<div class="wrap-vid">
									<div class="zoom-container">
										<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$newsSecond->first()->imgThumb) }}" />
									</div>
									<h3 class="vid-name"><a href="{{ asset('/'.$newsSecond->first()->slug) }}">{{ $newsSecond->first()->title }}</a></h3>
									<div class="info">
										<h5>Đăng bởi: <a href="#">{{ $newsSecond->first()->author()->first()->name }}</a></h5>
										<span><i class="fa fa-calendar"></i>{{ $newsSecond->first()->time_public }}</span> 
									</div>
								</div>
								<p class="more">{{ $newsSecond->first()->description }}</p>
							</div>
							<div class="col-md-6">
								@for($i = 1; $i < 5; $i++)
									@isset($newsSecond[$i])
									<div class="post wrap-vid">
										<div class="zoom-container">
											<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$newsSecond[$i]->imgThumb) }}" />
										</div>
										<div class="wrapper">
											<h5 class="vid-name"><a href="{{ asset('/'.$newsSecond[$i]->slug) }}">{{ $newsSecond[$i]->title }}</a></h5>
											<div class="info">
												<h6>Đăng bởi: <a href="#">{{ $newsSecond[$i]->author()->first()->name }}</a></h6>
												<span><i class="fa fa-calendar"></i>{{ $newsSecond[$i]->time_public }}</span>
											</div>
										</div>
									</div>
									@endisset
								@endfor
							</div>
						</div>
					</div>
				</div>
				<div class="box">
					<div class="box-header header-photo">
						<h2>Thư viện ảnh</h2>
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
				<div class="box">
					<div class="box-header header-natural">
						<h2>{{ $newsBot->first()->cate()->first()->cate_name }}</h2>
					</div>
					<div class="box-content">
						<div class="row">
							@for ($i = 0; $i < 5; $i++)
								@isset($newsBot[$i])
								<div class="col-md-6">
									<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$newsBot[$i]->imgThumb) }}" />
									<h3><a href="{{ asset('/'.$newsBot[$i]->slug) }}">{{ $newsBot[$i]->title }}</a></h3>
									<span><i class="fa fa-calendar"></i> {{ $newsBot[$i]->time_public }} / <i class="fa fa-comment-o"> / </i> 10 <i class="fa fa-eye"></i> 945</span>
									<p>{{ $newsBot[$i]->description }}</p>
								</div>
								@endisset
							@endfor
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="sidebar">
			<div class="col-md-3">
				<!---- Start Widget ---->
				<div class="widget wid-vid">
					<div class="heading">
						<h4>Nhiều người quan tâm</h4>
					</div>
					<div class="content">
						<div id="popular">
							@for ($i = 0; $i < 3; $i++)
								@isset($popularNews[$i])
								<div class="post wrap-vid">
									<div class="zoom-container">
										<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$popularNews[$i]->imgThumb) }}" />
									</div>
									<div class="wrapper">
										<h5 class="vid-name"><a href="{{ asset('/'.$popularNews[$i]->slug) }}">{{ $popularNews[$i]->title }}</a></h5>
										<div class="info">
											<h6>Đăng bởi: <a href="#">{{ $popularNews[$i]->author()->first()->name }}</a></h6>
											<span><i class="fa fa-chat"></i>1,200 / <i class="fa fa-calendar"></i>{{ $popularNews[$i]->time_public }}</span>
										</div>
									</div>
								</div>
								@endisset
							@endfor	
						</div>
					</div>
				</div>
				<!---- Start Widget ---->
				<div class="widget wid-new-post">
					<div class="heading"><h4>Bài viết mới</h4></div>
					<div class="content">
						@for ($i = 0; $i < 5; $i++)
							@isset($news[$i])
							<h6><a href="{{ asset('/'.$news[$i]->slug) }}">{{ $news[$i]->title }}</a></h6>
							<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$news[$i]->imgThumb) }}" />
							<ul class="list-inline">
								<li><i class="fa fa-calendar"></i>{{ $news[$i]->time_public }}</li> 
								<li><i class="fa fa-comments"></i>1,200</li>
							</ul>
							<p>{{ $news[$i]->description }}...</p>
							@endisset
						@endfor
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
				<div class="widget wid-tags">
					<div class="heading"><h4>Tags</h4></div>
					<div class="content">
						<a href="#">animals</a>
						<a href="#">cooking</a>
						<a href="#">countries</a>
						<a href="#">home</a>
						<a href="#">likes</a>
						<a href="#">photo</a>
						<a href="#">link</a>
						<a href="#">video</a>
						<a href="#">travel</a>
						<a href="#">images</a>
						<a href="#">love</a>
						<a href="#">lists</a>
						<a href="#">makeup</a>
						<a href="#">media</a>
						<a href="#">password</a>
						<a href="#">pagination</a>
						<a href="#">pictures</a>
					</div>
				</div>
				<!---- Start Widget ---->
				<div class="widget wid-comment">
					<div class="heading"><h4>Top Comments</h4></div>
					<div class="content">
						<div class="post">
							<a href="single.html">
								<img src="images/ava-1.jpg" class="img-circle"/>
							</a>
							<div class="wrapper">
								<a href="#"><h5>Curabitur tincidunt porta lorem.</h5></a>
								<ul class="list-inline">
									<li><i class="fa fa-calendar"></i>25/3/2015</li> 
									<li><i class="fa fa-thumbs-up"></i>1,200</li>
								</ul>
							</div>
						</div>
						<div class="post">
							<a href="single.html">
								<img src="images/ava-2.png" class="img-circle"/>
							</a>
							<div class="wrapper">
								<a href="#"><h5>Curabitur tincidunt porta lorem.</h5></a>
								<ul class="list-inline">
									<li><i class="fa fa-calendar"></i>25/3/2015</li> 
									<li><i class="fa fa-thumbs-up"></i>1,200</li>
								</ul>
							</div>
						</div>
						<div class="post">
							<a href="single.html">
								<img src="images/ava-3.jpeg" class="img-circle"/>
							</a>
							<div class="wrapper">
								<a href="#"><h5>Curabitur tincidunt porta lorem.</h5></a>
								<ul class="list-inline">
									<li><i class="fa fa-calendar"></i>25/3/2015</li> 
									<li><i class="fa fa-thumbs-up"></i>1,200</li>
								</ul>
							</div>
						</div>
						<div class="post">
							<a href="single.html">
								<img src="images/ava-4.jpg" class="img-circle"/>
							</a>
							<div class="wrapper">
								<a href="#"><h5>Curabitur tincidunt porta lorem.</h5></a>
								<ul class="list-inline">
									<li><i class="fa fa-calendar"></i>25/3/2015</li> 
									<li><i class="fa fa-thumbs-up"></i>1,200</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!---- Start Widget ---->
				<div class="widget wid-banner">
					<div class="content">
						<img src="images/banner-2.jpg" class="img-responsive"/>
					</div>
				</div>
				<!---- Start Widget ---->
				<div class="widget wid-categoty">
					<div class="heading"><h4>Category</h4></div>
					<div class="content">
						<select class="col-md-12">
							<option>Mustard</option>
							<option>Ketchup</option>
							<option>Relish</option>
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
				<!---- Start Widget ---->
				<div class="widget wid-tweet">
					<div class="heading"><h4>Tweet</h4></div>
					<div class="content">
						<div class="tweet-item">
							<p><i class="fa fa-twitter"></i> TLAS - Coming Soon PSD Mockup</p>
							<a>https://t.co/dLsNZYGVbJ</a>
							<a>#psd</a>
							<a>#freebie</a>
							<a>#freebie</a>
							<a>#dribbble</a>
							<span>July 15th, 2015</span>
						</div>
						<div class="tweet-item">
							<p><i class="fa fa-twitter"></i> Little Dude Character With Multiple Hairs</p>
							<a>https://t.co/dLsNZYGVbJ</a>
							<a>#freebie</a>
							<a>#design</a>
							<a>#illustrator</a>
							<a>#dribbble</a>
							<span>June 23rd, 2015</span>
						</div>
						<div class="tweet-item">
							<p><i class="fa fa-twitter"></i> Newsletter Subscription Form Mockup</p>
							<a>https://t.co/dLsNZYGVbJ</a>
							<a>#psd</a>
							<a>#freebie</a>
							<a>#freebie</a>
							<a>#dribbble</a>
							<span>June 22nd, 2015</span>
						</div>
						<p>Marshall, Will, and Holly on a routine expedition, met the greatest earthquake ever known. High on the rapids, it struck their tiny raft...</p>
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
