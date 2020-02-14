@extends('home.app')

@section('css')
<link rel="stylesheet" type="text/css" href="styles/categories.css">
<link rel="stylesheet" type="text/css" href="styles/categories_responsive.css">
@endsection

@section('content')

	<!-- Home -->

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url(images/categories.jpeg)"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">Axolotl<span>.</span></div>
								<div class="home_text"><p>Axolotl (/ berasal dari bahasa Nāhuatl āxōlōtl (tunggal) atau āxōlōmeh (jamak) "monster air") atau salamander Meksiko (Ambystoma mexicanum) adalah salamander neotenik yang berhubungan dekat dengan salamander harimau. </p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<!-- Product Sorting -->
					<div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
						<div class="results">Showing <span>12</span> results</div>
						<div class="sorting_container ml-md-auto">
							<div class="sorting">
								<ul class="item_sorting">
									<li>
										<span class="sorting_text">Sort by</span>
										<i class="fa fa-chevron-down" aria-hidden="true"></i>
										<ul>
											<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "original-order" }'><span>Default</span></li>
											<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "price" }'><span>Price</span></li>
											<li class="product_sorting_btn" data-isotope-option='{ "sortBy": "stars" }'><span>Name</span></li>
										</ul>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col">
					
					<div class="product_grid">

					@if(count($product)>0)
                        @foreach ($product as $products)
						<!-- Product -->
						<div class="product">
							<a href="{{url('/detailproduk/'.$products->id)}}">
							<div class="product_image"><img src="http://127.0.0.1:8000/storage/file/{{$products->photo}}" alt=""></div>
						@if($products->stok == 1)
							<div class="product_extra product_sale"><a href="categories.html">ada</a></div>
						
						@else
							<div class="product_extra product_hot"><a href="categories.html">kosong</a></div>

                        @endif

							<div class="product_content">
								<div class="product_title">
							<a href="{{url('/detailproduk/'.$products->id)}}">
									{{$products->nama}}
							</a>
								</div>
								<div class="product_price">Rp.{{$products->harga}}</div>
							</div>
							</a>
						</div>
						@endforeach
                        @endif

					</div>
					<div class="product_pagination" style="margin-bottom:50px;">
					@if($product)

					
					{{ $product->links() }}

					@endif

					</div>
						
				</div>
			</div>
		</div>
	</div>
	@endsection