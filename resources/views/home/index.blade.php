@extends('home.layouts.app')

@section('content')

	<!--new-arrivals-->
		<div class="new-arrivals-w3agile">
			<div class="container">
				<h2 class="tittle">Top Hot Books</h2>
				<div class="arrivals-grids">
					@foreach($books as $book)
					<div class="col-md-3 arrival-grid simpleCart_shelfItem">
						<div class="grid-arr">
							<div  class="grid-arrival">
								<figure>
									<a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
										<div class="grid-img">
											<img  src="{{asset('images/books/'.$book->back_cover)}}"  width="100%" height="100%">
										</div>
										<div class="grid-img">
											<img  src="{{asset('images/books/'.$book->front_cover)}}" width="100%" height="100%">
										</div>
									</a>
								</figure>
							</div>
							<div class="ribben1">
								<p>SALE</p>
							</div>
							<div class="block">
								<div class="starbox small ghosting"> </div>
							</div>
							<div class="women">
								<h6><a href="{{route('show', ['id'=>$book->id])}}">{{$book->name}}</a></h6>
								<span class="size">{{$book->author->name}}</span>
								<p><em class="item_price">{{$book->price.' VND'}}</em></p>
							</div>
						</div>
					</div>
					@endforeach
					{{ $books->links() }}
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	<!--new-arrivals-->
	<!--accessories-->
		<div class="accessories-w3l">
				<div class="container">
					<h3 class="tittle">20% Discount on</h3>
					<span>REFERENCE BOOKS</span>
					<div class="button">
						<a href="#" class="button1"> Quick View</a>
					</div>
				</div>
			</div>
	<!--accessories-->
	<!--Products-->
		<div class="product-agile">
			<div class="container">
				<h3 class="tittle1"> New Books</h3>
				<div class="slider">
					<div class="callbacks_container">
						<ul class="rslides" id="slider">
							<li>
								<div class="caption">
									@foreach($books as $book)
									<div class="col-md-3 cap-left simpleCart_shelfItem">
										<div class="grid-arr">
											<div  class="grid-arrival">
												<figure>
													<a href="show_book.blade.php">
														<div class="grid-img">
															<img  src="{{asset('images/books/'.$book->back_cover)}}"  width="100%" height="100%">
														</div>
														<div class="grid-img">
															<img  src="{{asset('images/books/'.$book->front_cover)}}" width="100%" height="100%">
														</div>
													</a>
												</figure>
											</div>
											<div class="block">
												<div class="starbox small ghosting"> </div>
											</div>
											<div class="women">
												<h6><a href="{{route('show', ['id'=>$book->id])}}">{{$book->name}}</a></h6>
												<span class="size">{{$book->author->name}}</span>
												<p><em class="item_price">{{$book->price.' VND'}}</em></p>
											</div>
										</div>
									</div>
									@endforeach
									<div class="clearfix"></div>
								</div>
							</li>

						</ul>
					</div>
				</div>
			</div>
		</div>
	<!--Products-->

		<div class="new-arrivals-w3agile">
					<div class="container">
						<h3 class="tittle1">Best Sellers</h3>
						<div class="arrivals-grids">
							@foreach($books as $book)
							<div class="col-md-3 arrival-grid simpleCart_shelfItem">
								<div class="grid-arr">
									<div  class="grid-arrival">
										<figure>		
											<a href="show_book.blade.php">
												<div class="grid-img">
													<img  src="{{asset('images/books/'.$book->back_cover)}}"  width="100%" height="100%">
												</div>
												<div class="grid-img">
													<img  src="{{asset('images/books/'.$book->front_cover)}}" width="100%" height="100%">
												</div>
											</a>		
										</figure>	
									</div>
									<div class="ribben">
										<p>NEW</p>
									</div>
									<div class="ribben1">
										<p>SALE</p>
									</div>
									<div class="block">
										<div class="starbox small ghosting"> </div>
									</div>
									<div class="women">
										<h6><a href="{{route('show', ['id'=>$book->id])}}">{{$book->name}}</a></h6>
										<span class="size">{{$book->author->name}}</span>
										<p><em class="item_price">{{$book->price.' VND'}}</em></p>
									</div>
								</div>
							</div>
							@endforeach
							<div class="clearfix"></div>
						</div>
					</div>
				</div>

		<div class="latest-w3">
				<div class="container">
					<h3 class="tittle1">Other Books</h3>
					<div class="latest-grids">
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="{{asset('frontend/images/l1.jpg')}}" >
								<div class="latest-text">
									<h4>Sách vở</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="{{asset('frontend/images/l2.jpg')}}" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Dụng cụ ht</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="{{asset('frontend/images/l3.jpg')}}" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Bút viết</h4>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="latest-grids">
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="{{asset('frontend/images/l4.jpg')}}" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Sáp màu</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="{{asset('frontend/images/l5.jpg')}}" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Chì màu</h4>
								</div>
							</div>
						</div>
						<div class="col-md-4 latest-grid">
							<div class="latest-top">
								<img  src="{{asset('frontend/images/l6.jpg')}}" class="img-responsive"  alt="">
								<div class="latest-text">
									<h4>Bút xóa</h4>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		<!--new-arrivals-->

@endsection