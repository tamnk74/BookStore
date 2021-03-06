@extends('home.layouts.app')
@section('content')
	<div class="products-agileinfo">
		@if(!isset($key))
		<h2 class="tittle">Tất cả sách</h2>
		@else
			<h2 class="tittle">Kết quả tìm kiếm cho "{{ $key }}"</h2>
		@endif
					<div class="container">
						<div class="product-agileinfo-grids w3l">
							<div class="col-md-3 product-agileinfo-grid">
								<div class="categories">
									<h3>Thể loại sách</h3>
									<ul class="tree-list-pad">
										@foreach($categories as $category)
											<li>
												<a href="{{ route('category', ['id' => $category->id]) }}">{{ $category->name }}</a>
											</li>
										@endforeach
									</ul>
								</div>
							</div>
							<div class="col-md-9 product-agileinfon-grid1 w3l">
								<div class="mens-toolbar">
									<p >Hiển thị {{count($books)}} cuốn sách của {{ $books->total() }} kết quả</p>
									<div class="clearfix"></div>
								</div>
								<div class="product-tab">
									<div class="row">
									@foreach($books as $book)
										@if($loop->iteration %3 ==1 && $loop->iteration>1 )
											</div>
											<div class="row">
										@endif
										<div class="col-md-4 product-tab-grid simpleCart_shelfItem">
											<div class="grid-arr">
												<div  class="grid-arrival">
													<figure>
														<a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
															<div class="grid-img">
																<img  src="{{ asset('images/books/'.$book->back_cover) }}" alt="">
															</div>
															<div class="grid-img">
																<img  src="{{ asset('images/books/'.$book->front_cover) }}" alt="">
															</div>
														</a>
													</figure>
												</div>
												<div class="book-info">
													<h6><a href="{{route('show', ['id'=>$book->id])}}">{{$book->name}}</a></h6>
													<span class="size">{{$book->author->name}}</span>
													<p>
														@if($book->sale > 0)
															<del>{{$book->price.' VND'}}</del><em class="item_price">{{($book->price*(100-$book->sale)/100).' VND'}}</em>
														@else
															<em class="item_price">{{$book->price.' VND'}}</em>
														@endif
													</p>
												</div>
											</div>
									</div>
									@endforeach
									</div>
								</div>
								{{ $books->links() }}
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
@endsection