@extends('home.layouts.app')
@section('content')
	<div class="products-agileinfo">
		<h2 class="tittle">ALL BOOKS</h2>
					<div class="container">
						<div class="product-agileinfo-grids w3l">
							<div class="col-md-3 product-agileinfo-grid">
								<div class="categories">
									<h3>Categories</h3>
									<ul class="tree-list-pad">
										<li><input type="checkbox" checked="checked" id="item-0" /><label for="item-0"><span></span>Women's Wear</label>
											<ul>
												<li><input type="checkbox" id="item-0-0" /><label for="item-0-0">Ethnic Wear</label>
													<ul>
														<li><a href="books.blade.php">Shirts</a></li>
														<li><a href="books.blade.php">Caps</a></li>
														<li><a href="books.blade.php">Shoes</a></li>
														<li><a href="books.blade.php">Pants</a></li>
														<li><a href="books.blade.php">SunGlasses</a></li>
														<li><a href="books.blade.php">Trousers</a></li>
													</ul>
												</li>
												<li><input type="checkbox"  id="item-0-1" /><label for="item-0-1">Party Wear</label>
													<ul>
														<li><a href="books.blade.php">Shirts</a></li>
														<li><a href="books.blade.php">Caps</a></li>
														<li><a href="books.blade.php">Shoes</a></li>
														<li><a href="books.blade.php">Pants</a></li>
														<li><a href="books.blade.php">SunGlasses</a></li>
														<li><a href="books.blade.php">Trousers</a></li>
													</ul>
												</li>
												<li><input type="checkbox"  id="item-0-2" /><label for="item-0-2">Casual Wear</label>
													<ul>
														<li><a href="books.blade.php">Shirts</a></li>
														<li><a href="books.blade.php">Caps</a></li>
														<li><a href="books.blade.php">Shoes</a></li>
														<li><a href="books.blade.php">Pants</a></li>
														<li><a href="books.blade.php">SunGlasses</a></li>
														<li><a href="books.blade.php">Trousers</a></li>
													</ul>
												</li>
											</ul>
										</li>
										<li><input type="checkbox" id="item-1" checked="checked" /><label for="item-1">Best Collections</label>
											<ul>
												<li><input type="checkbox" checked="checked" id="item-1-0" /><label for="item-1-0">New Arrivals</label>
													<ul>
														<li><a href="books.blade.php">Shirts</a></li>
														<li><a href="books.blade.php">Shoes</a></li>
														<li><a href="books.blade.php">Pants</a></li>
														<li><a href="books.blade.php">SunGlasses</a></li>
													</ul>
												</li>

											</ul>
										</li>
										<li><input type="checkbox" checked="checked" id="item-2" /><label for="item-2">Best Offers</label>
											<ul>
												<li><input type="checkbox"  id="item-2-0" /><label for="item-2-0">Summer Discount Sales</label>
													<ul>
														<li><a href="books.blade.php">Shirts</a></li>
														<li><a href="books.blade.php">Shoes</a></li>
														<li><a href="books.blade.php">Pants</a></li>
														<li><a href="books.blade.php">SunGlasses</a></li>
													</ul>
												</li>
												<li><input type="checkbox" id="item-2-1" /><label for="item-2-1">Exciting Offers</label>
													<ul>
														<li><a href="books.blade.php">Shirts</a></li>
														<li><a href="books.blade.php">Shoes</a></li>
														<li><a href="books.blade.php">Pants</a></li>
														<li><a href="books.blade.php">SunGlasses</a></li>
													</ul>
												</li>
												<li><input type="checkbox" id="item-2-2" /><label for="item-2-2">Flat Discounts</label>
													<ul>
														<li><a href="books.blade.php">Shirts</a></li>
														<li><a href="books.blade.php">Shoes</a></li>
														<li><a href="books.blade.php">Pants</a></li>
														<li><a href="books.blade.php">SunGlasses</a></li>
													</ul>
												</li>
											</ul>
										</li>
									</ul>
								</div>
							</div>
							<div class="col-md-9 product-agileinfon-grid1 w3l">
								<div class="mens-toolbar">
									<p >Showing {{count($books)}} results</p>
									 <p class="showing">Sorting By
										<select>
											  <option value=""> Name</option>
											  <option value="">  Rate</option>
												<option value=""> Color </option>
												<option value=""> Price </option>
										</select>
									  </p>
									  <p>Show
										<select>
											  <option value=""> 9</option>
											  <option value="">  10</option>
												<option value=""> 11 </option>
												<option value=""> 12 </option>
										</select>
									  </p>
									<div class="clearfix"></div>
								</div>
								<div class="product-tab">
									@foreach($books as $book)
									<div class="col-md-4 product-tab-grid simpleCart_shelfItem">
										<div class="grid-arr">
											<div  class="grid-arrival">
												<figure>
													<a href="#" class="new-gri" data-toggle="modal" data-target="#myModal1">
														<div class="grid-img">
															<img  src="{{ asset('images/books/'.$book->image) }}" alt="">
														</div>
														<div class="grid-img">
															<img  src="{{ asset('images/books/'.$book->image) }}" alt="">
														</div>
													</a>
												</figure>
											</div>
											<div class="block">
												<div class="starbox small ghosting"> </div>
											</div>
											<div class="women">
												<h6><a href="show_book.blade.php">{{$book->name}}</a></h6>
												<span class="size">{{$book->author->name}}</span>
												<p ><del>$100.00</del><em class="item_price">{{$book->price.' VND'}}</em></p>
											</div>
										</div>
									</div>
									@endforeach
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
@endsection