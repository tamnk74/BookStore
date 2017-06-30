@extends('home.layouts.app')

@section('content')

<!--new-arrivals-->
<div class="new-arrivals-w3agile">
	<div class="container">
		<h2 class="tittle">Sách bán chạy trong tháng</h2>
		<div class="arrivals-grids">
			<div class="row">
				@foreach($topBooks as $book)
                    <?php $book = $book->book;?>
					@if($loop->iteration %4 ==1 && $loop->iteration>1 )
					</div>
					<div class="row">
					@endif
			<div class="col-md-3 arrival-grid simpleCart_shelfItem">
				<div class="grid-arr">
					<div  class="grid-arrival">
						<figure>
							<a href="{{ route('show', ['id'=> $book->id]) }}" class="new-gri">
								<div class="grid-img">
									<img  src="{{asset('images/books/'.$book->back_cover)}}"  width="100%" height="100%">
								</div>
								<div class="grid-img">
									<img  src="{{asset('images/books/'.$book->front_cover)}}" width="100%" height="100%">
								</div>
							</a>
						</figure>
					</div>
					@if($book->sale>0)
						<div class="ribben1">
							<p>Sale {{ $book->sale }}%</p>
						</div>
					@endif
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
	</div>
</div>
<!--new-arrivals-->
<!--accessories-->
<div class="accessories-w3l">
	<div class="container">
		<span>Nhà sách đang giảm giá nhiều loại sách</span>
	</div>
</div>
<!--accessories-->
<!--Products-->
<div class="product-agile">
	<div class="container">
		<h3 class="tittle1">Sách mới nhập về</h3>
		<div class="arrivals-grids">
			<div class="row">
				@foreach($newBooks as $book)
					@if($loop->iteration %4 ==1 && $loop->iteration>1 )
			</div>
			<div class="row">
				@endif
				<div class="col-md-3 arrival-grid simpleCart_shelfItem">
					<div class="grid-arr">
						<div  class="grid-arrival">
							<figure>
								<a href="{{ route('show', ['id'=> $book->id]) }}" class="new-gri">
									<div class="grid-img">
										<img  src="{{asset('images/books/'.$book->back_cover)}}"  width="100%" height="100%">
									</div>
									<div class="grid-img">
										<img  src="{{asset('images/books/'.$book->front_cover)}}" width="100%" height="100%">
									</div>
								</a>
							</figure>
						</div>
						@if($book->sale>0)
							<div class="ribben1">
								<p>SALE {{ $book->sale }}%</p>
							</div>
						@endif
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
	</div>
</div>
<!--Products-->

<div class="new-arrivals-w3agile">
	<div class="container">
		<h3 class="tittle1">Sách bán chạy</h3>
		<div class="arrivals-grids">
			<div class="row">
				@foreach($bestSellerBooks as $book)
					<?php $book = $book->book;?>
					@if($loop->iteration %4 ==1 && $loop->iteration>1 )
			</div>
			<div class="row">
				@endif
				<div class="col-md-3 arrival-grid simpleCart_shelfItem">
					<div class="grid-arr">
						<div  class="grid-arrival">
							<figure>
								<a href="{{ route('show', ['id'=> $book->id]) }}" class="new-gri">
									<div class="grid-img">
										<img  src="{{asset('images/books/'.$book->back_cover)}}"  width="100%" height="100%">
									</div>
									<div class="grid-img">
										<img  src="{{asset('images/books/'.$book->front_cover)}}" width="100%" height="100%">
									</div>
								</a>
							</figure>
						</div>
						@if($book->sale>0)
							<div class="ribben1">
								<p>SALE {{ $book->sale }}%</p>
							</div>
						@endif
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
	</div>
</div>

@endsection