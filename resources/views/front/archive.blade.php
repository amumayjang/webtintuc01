@extends('master')
@section('content')
	<div class="featured container">
		<div id="owl-demo" class="owl-carousel">
			@foreach ($newPosts as $item)
			<div class="item">
				<div class="zoom-container">
					<div class="zoom-caption">
						<span>{{ $item->cate_name }}</span>
						<a href="{{ asset('/'.$item->slug) }}"></a>
						<p>{{ $item->title }}</p>
					</div>
					<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$item->imgThumb) }}" />
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<!-- Header -->
	
	<!-- /////////////////////////////////////////Content -->
	<div id="page-content" class="archive-page container">
		<div class="">
			<div class="row">
				<div id="main-content" class="col-md-8">
					@foreach ($postInCate as $item)
					<div class="box">
						<a href="#"><h2 class="vid-name">{{ $item->title }}</h2></a>
						<div class="info">
							<h5>Đăng bởi: <a href="#">{{ $item->name }}</a></h5>
							<span><i class="fa fa-calendar"></i> {{ $item->time_public }}</span> 
							<span><i class="fa fa-comment"></i> 0 Comments</span>
							<span><i class="fa fa-eye"></i>{{ $item->view }}</span>
						</div>
						<div class="wrap-vid">
							<div class="zoom-container">
								<div class="zoom-caption">
								</div>
								<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$item->imgThumb) }}" />
							</div>
							<p>{{ $item->description }} <a href="{{ asset('/'.$item->slug) }}">Đọc tiếp...</a></p>
						</div>
					</div>
					<hr class="line">
					@endforeach
					<div class="box">
						<center>
						<ul class="pagination">
							@if ($postInCate->currentPage() != 1)
							<li>
							  <a href="{!! $postInCate->url($postInCate->currentPage() - 1) !!}" aria-label="Previous">
								<span aria-hidden="true">&laquo;</span>
							  </a>
							</li>
							@endif
							@for ($i = 1; $i <= $postInCate->lastPage(); $i++)
							<li class="{!! $postInCate->currentPage() == $i ? 'active' : '' !!}"><a href="{!! $postInCate->url($i) !!}">{{ $i }}</a></li>
							@endfor
							@if ($postInCate->currentPage() != $postInCate->lastPage())
							<li>
							  <a href="{!! $postInCate->url($postInCate->currentPage() + 1) !!}" aria-label="Next">
								<span aria-hidden="true">&raquo;</span>
							  </a>
							</li>
							@endif
						</ul>
						</center>
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
						<div class="heading"><h4>Tin HOT</h4></div>
						<div class="content">
							@foreach ($postHot as $item)
							<div class="post wrap-vid">
								<div class="zoom-container">
									<div class="zoom-caption">
										<span>{{ $item->cate_name }}</span>
										<a href="{{ asset('/'.$item->slug) }}"></a>
									</div>
									<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$item->imgThumb) }}" />
								</div>
								<div class="wrapper">
									<h5 class="vid-name"><a href="{{ asset('/'.$item->slug) }}">{{ $item->title }}</a></h5>
									<div class="info">
										<h6>Đăng bởi: <a href="#">{{ $item->name }}</a></h6>
										<span><i class="fa fa-calendar"></i>{{ $item->time_public }}</span> 
										<span><i class="fa fa-eye"></i>{{ $item->view }}</span>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<!---- Start Widget ---->
					<div class="widget ">
						<div class="heading"><h4>Được chú ý</h4></div>
						<div class="content">
							@foreach ($popularPost as $item)
							<div class="wrap-vid">
								<div class="zoom-container">
									<div class="zoom-caption">
										<span>{{ $item->cate_name }}</span>
										<a href="{{ asset('/'.$item->slug) }}"></a>
									</div>
									<img src="{{ asset('public/admin/uploads/images/thumbnail-articles/'.$item->imgThumb) }}" />
								</div>
								<h3 class="vid-name"><a href="{{ asset('/'.$item->slug) }}">{{ $item->title }}</a></h3>
								<div class="info">
									<h5>Đăng bởi: <a href="#">{{ $item->name }}</a></h5>
									<span><i class="fa fa-calendar"></i>{{ $item->time_public }}</span> 
									<span><i class="fa fa-heart"></i>{{ $item->view }}</span>
								</div>
							</div>
							@endforeach
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
