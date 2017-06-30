@extends('home.layouts.app')
@section('meta')
	<meta property="fb:app_id" content="1747971682199772" />
	<meta property='og:locale' content='vi_VN' />
	<meta property="og:url"           content="http://bookstore.dn.com{{ $_SERVER['REQUEST_URI'] }}" />
	<meta property="og:type"          content="books.book" />
	<meta property="og:title"         content="{{ $book->name }}" />
	<meta property="og:description"   content="{{ \Illuminate\Support\Str::words(strip_tags($book->description), 15, '...') }}" />
	<meta property="og:image"         content="{{ asset('images/books/'.$book->front_cover) }}" />

@endsection
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
									<p><span  class="price item_price">@lang('homepages.cover_price'): {{ $book->price }} VND</span></p>
								@else
									<p><span class="price item_price">@lang('homepages.cover_price'):</span> <del>{{ $book->price }} VND</del><span class="price item_price">{{ $book->price*(100-$book->sale)/100 }} VND</span></p>
								@endif
							</div>
							<br>
							<div>
								<h4>Tình trạng: {!! $book->store->amount == 0 ? '<label class="label label-danger"><b>hết hàng</b></label>' : '<label class="label label-info"><b>còn hàng</b></label>' !!}</h4>
							</div>
							<br>
							<div class="description">
								<p><span>Giới thiệu : </span>{{ \Illuminate\Support\Str::words(strip_tags($book->description), 50, '...') }}</p>
							</div>
							<!-- Your share button code -->
							<div class="fb-like fb-share-button"
								 data-href="http://bookstore.dn.com{{ $_SERVER['REQUEST_URI'] }}"
								 data-layout="standard" data-action="like"
								 data-size="small" data-show-faces="true"
								 data-share="true">
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
					<div class="col-md-3 product-grid1">
						<h3>@lang('homepages.authored_books')</h3>
						@foreach($authoredBooks as $authoredBook)
							<div class="recent-grids">
								<div class="recent-left">
									<a href="{{route('show', ['id'=>$authoredBook->id])}}"><img class="img-responsive " src="{{ asset('images/books/'.$authoredBook->front_cover) }}" alt=""></a>
								</div>
								<div class="recent-right" style="margin-top: 0">
									<h6 class="best2"><a href="{{route('show', ['id'=>$authoredBook->id])}}">{{ $authoredBook->name }}</a></h6>
									<h6>{{ $authoredBook->author->name }}</h6>
									<span class=" price-in1">{{ $authoredBook->price*(100-$authoredBook->sale)/100 }} VND</span>
								</div>
								<div class="clearfix"> </div>
							</div>
						@endforeach
					</div>
					<div class="col-md-9 product-grid1">
						<div class="tab-wl3">
							<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
								<ul id="myTab" class="nav nav-tabs left-tab" role="tablist">
									<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Description</a></li>
									<li role="presentation" class=""><a href="#reviews" role="tab" id="reviews-tab" data-toggle="tab" aria-controls="reviews" class="disabled">
											Comments (<span class="fb-comments-count" data-href="https://developers.facebook.com/apps/1747971682199772/{{str_slug($book->name)}}"></span>)</a></li>
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
											</div><br>
											<h5>@lang('homepages.detail_information')</h5><hr>
											<div class="book_details">
												<table class="table table-bordered table-striped">
													<colgroup>
														<col style="width: 25%;"><col>
													</colgroup>
													<tbody>
													<tr>
														<td>@lang('books.label_book_name')</td>
														<td>{{ $book->name }}</td>
													</tr>
													<tr>
														<td>@lang('books.label_book_author')</td>
														<td>{{ $book->author->name }}</td>
													</tr>
													<tr>
														<td>@lang('books.label_book_publisher')</td>
														<td>{{ $book->publisher->name }}</td>
													</tr>
													<tr>
														<td>@lang('books.label_book_issuer')</td>
														<td>{{ $book->issuer->name }}</td>
													</tr>
													<tr>
														<td>@lang('books.label_book_publishing_year')</td>
														<td>{{ $book->publishing_year }}</td>
													</tr>
													<tr>
														<td>@lang('books.label_book_weight')</td>
														<td>{{ $book->weight }} gram</td>
													</tr>
													<tr>
														<td>@lang('books.label_page')</td>
														<td>{{ $book->page }}</td>
													</tr>
													<tr>
														<td>@lang('books.label_book_size')</td>
														<td>{{ $book->size }} cm</td>
													</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<div role="tabpanel" class="tab-pane fade" id="reviews" aria-labelledby="reviews-tab">
										<div class="descr">
											<!-- Your embedded comments code -->
											<div class="fb-comments" data-href="https://developers.facebook.com/apps/1747971682199772/{{str_slug($book->name)}}" data-width="100%" data-numposts="5"></div>
										</div>
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
