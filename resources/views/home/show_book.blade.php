@extends('home.layouts.app')

@section('front-scripts')
	<script defer src="{{asset('frontend/js/jquery.flexslider.js')}}"></script>
	<link rel="stylesheet" href="{{asset('frontend/css/flexslider.css')}}" type="text/css" media="screen" />
	<script src="{{asset('frontend/js/imagezoom.js')}}"></script>


@endsection
@section('content')
	<!--single-->
	<div class="single-wl3">
		<div class="container">
			<div class="single-grids">
				<div class="col-md-9 single-grid">
					<div clas="single-top">
						<div class="single-left">
							<div class="flexslider">

								<div class="flex-viewport" style="overflow: hidden; position: relative;">
									<ul class="slides" style="width: 1000%; transition-duration: 0.6s; transform: translate3d(-1159.2px, 0px, 0px);">
										<li data-thumb="{{ asset('images/books/'.$book->front_cover) }}" class="clone" aria-hidden="true" style="width: 386.4px; float: left; display: block; height:100%;">
											<div class="thumb-image"> <img src="{{ asset('images/books/'.$book->front_cover) }}" data-imagezoom="true" class="img-responsive" draggable="false"> </div>
										</li>
										<li data-thumb="{{ asset('images/books/'.$book->back_cover) }}" class="" style="width: 386.4px; float: left; display: block; height:100%;">
											<div class="thumb-image"> <img src="{{ asset('images/books/'.$book->back_cover) }}" data-imagezoom="true" class="img-responsive" draggable="false"> </div>
										</li>
									</ul>
								</div>


							</div>

						</div>
						<div class="single-right simpleCart_shelfItem">
							<h1>{{ $book->name }}</h1>
							<br><br>
							<div>
								<h4>@lang('books.label_book_author'): {{$book->author->name}}</h4>
							</div>
							<br>
							<div>
								<h4>@lang('books.label_book_publisher'): {{$book->publisher->name}}</h4>
							</div>
							{{--<div class="block">
								<div class="starbox small ghosting"> abc</div>
							</div>--}}
							<p class="price item_price">{{ $book->price }} VND</p>
							<div class="description">
								<p><span>Quick Overview : </span> In cursus faucibus tortor eu vestibulum. Ut eget turpis ac justo porta varius. Donec vel felis ante, ac vehicula ipsum. Quisque sed diam metus. Quisque eget leo sit amet erat varius rutrum vitae dapibus lectus. Vivamus et sapien ante. Suspendisse potenti. Fusce in tellus est, ac consequat.</p>
							</div>
							<div class="color-quality">
								<h6>Quality :</h6>
									<div class="quantity">
										<div class="quantity-select">
											<div class="entry value-minus1">&nbsp;</div>
											<div class="entry value1"><span>1</span></div>
											<div class="entry value-plus1 active">&nbsp;</div>
										</div>
									</div>
										<!--quantity-->
												<script>
												$('.value-plus1').on('click', function(){
													var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)+1;
													divUpd.text(newVal);
												});

												$('.value-minus1').on('click', function(){
													var divUpd = $(this).parent().find('.value1'), newVal = parseInt(divUpd.text(), 10)-1;
													if(newVal>=1) divUpd.text(newVal);
												});
												</script>
											<!--quantity-->
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 single-grid1">
					<h3>Related Products</h3>
					@foreach($relatedBooks as $relatedBook)
					<div class="recent-grids">
						<div class="recent-left">
							<a href="{{route('show', ['id'=>$relatedBook->id])}}"><img class="img-responsive " src="{{ asset('images/books/'.$relatedBook->front_cover) }}" alt=""></a>
						</div>
						<div class="recent-right" style="margin-top: 0">
							<h6 class="best2"><a href="{{route('show', ['id'=>$relatedBook->id])}}">{{ $relatedBook->name }}</a></h6>
							<h6>{{ $relatedBook->author->name }}</h6>
							<span class=" price-in1">{{ $relatedBook->price*(100-$relatedBook->sale)/100 }} VND</span>
						</div>
						<div class="clearfix"> </div>
					</div>
					@endforeach
				</div>
				<div class="clearfix"> </div>
			</div>

		</div>
	</div>
@endsection

@section('scripts')
	<script>
        // Can also be used with $(document).ready()
        $(document).ready(function() {
            $('.flexslider').flexslider({
                animation: "slide",
                controlNav: "thumbnails"
            });
        });
	</script>
	@endsection
