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
							<div>
								<h4>@lang('books.label_book_issuer'): {{$book->issuer->name}}</h4>
							</div>
							<div>
								@if($book->sale==0)
								<p class="price item_price">{{ $book->price }} VND<p class="price item_price">
								@else
									<p><span class="price item_price">@lang('homepages.cover_price'):</span> <del>{{ $book->price }} VND</del><span class="price item_price">{{ $book->price*(100-$book->sale)/100 }} VND</span></p>
								@endif
							</div>
							<div>
								<p></p>
							</div>
							<div class="description">
								<p><span>Quick Overview : </span> In cursus faucibus tortor eu vestibulum. Ut eget turpis ac justo porta varius. Donec vel felis ante, ac vehicula ipsum. Quisque sed diam metus. Quisque eget leo sit amet erat varius rutrum vitae dapibus lectus. Vivamus et sapien ante. Suspendisse potenti. Fusce in tellus est, ac consequat.</p>
							</div>

						</div>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="col-md-3 single-grid1">
					<h3>@lang('homepages.related_books')</h3>
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


			<div class="product-w3agile">
				<h3 class="tittle1">@lang('homepages.product_description')</h3>
				<div class="product-grids">
					<div class="col-md-4 product-grid">
						<div id="book_author">
							<h4 class="text-center">@lang('homepages.book_author')</h4>
							<h3>{{ $book->author->name }}</h3>
						</div>
					</div>
					<div class="col-md-8 product-grid1">
						<div class="tab-wl3">
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
									<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
									<li role="presentation" class=""><a href="#reviews" role="tab" id="reviews-tab" data-toggle="tab" aria-controls="reviews">Reviews (1)</a></li>
								</ul>
								<div id="myTabContent" class="tab-content">
									<div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
										<div class="descr">
											<h4>{{ $book->name }}</h4>
											<div class="description_book">
												@if(empty($book->description))
													@lang('homepages.no_data_to_display')
												@else
													{!! $book->description !!}
												@endif
											</div>
											<div class="book_details">
												<table class=" table table-bordered">
													<tr>
														<td>@lang('books.label_book_name')</td>
														<td>{{ empty($book->name) ? @lang('homepages.no_data_to_display') : $book->name }}</td>
													</tr>
												</table>
											</div>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane fade" id="reviews" aria-labelledby="reviews-tab">
										<div class="descr">
											<div class="reviews-top">
												<div class="reviews-left">
													<img src="images/men3.jpg" alt=" " class="img-responsive">
												</div>
												<div class="reviews-right">
													<ul>
														<li><a href="#">Admin</a></li>
														<li><a href="#"><i class="glyphicon glyphicon-share" aria-hidden="true"></i>Reply</a></li>
													</ul>
													<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit.</p>
												</div>
												<div class="clearfix"></div>
											</div>
											<div class="reviews-bottom">
												<h4>Add Reviews</h4>
												<p>Your email address will not be published. Required fields are marked *</p>
												<p>Your Rating</p>
												<div class="block">
													<div class="starbox small ghosting"><div class="positioner"><div class="stars"><div class="ghost" style="display: none; width: 0px;"></div><div class="colorbar" style="width: 0px;"></div><div class="star_holder"><div class="star star-0"></div><div class="star star-1"></div><div class="star star-2"></div><div class="star star-3"></div><div class="star star-4"></div></div></div></div></div>
												</div>
												<form action="#" method="post">
													<label>Your Review </label>
													<textarea type="text" name="Message" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message...';}" required="">Message...</textarea>
													<div class="row">
														<div class="col-md-6 row-grid">
															<label>Name</label>
															<input type="text" value="Name" name="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
														</div>
														<div class="col-md-6 row-grid">
															<label>Email</label>
															<input type="email" value="Email" name="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
														</div>
														<div class="clearfix"></div>
													</div>
													<input type="submit" value="SEND">
												</form>
											</div>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane fade" id="custom" aria-labelledby="custom-tab">

									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"> </div>
				</div>
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
