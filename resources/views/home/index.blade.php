@extends('home.app')
@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('styles/responsive.css')}}">
@endsection

@section('content')

	<!-- Home -->

	<div class="home">
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(images/home_slider_1.jpeg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
										<div class="home_slider_title">Axotic farm online store.</div>
										<div class="home_slider_subtitle">seller dan breder axolotl terpercaya</div>
										<div class="button button_light home_button"><a href="{{url ('/list')}}">beli sekarang</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(images/home_slider_2.jpeg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
									<div class="home_slider_title">Axotic farm online store.</div>
										<div class="home_slider_subtitle">seller dan breder axolotl terpercaya</div>
										<div class="button button_light home_button"><a href="{{url ('/list')}}">beli sekarang</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Slider Item -->
				<div class="owl-item home_slider_item">
					<div class="home_slider_background" style="background-image:url(images/home_slider_3.jpeg)"></div>
					<div class="home_slider_content_container">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_slider_content"  data-animation-in="fadeIn" data-animation-out="animate-out fadeOut">
									<div class="home_slider_title">Axotic farm online store.</div>
										<div class="home_slider_subtitle">seller dan breder axolotl terpercaya</div>
										<div class="button button_light home_button"><a href="{{url ('/list')}}">beli sekarang</a></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<!-- Home Slider Dots -->
			
			<div class="home_slider_dots_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_slider_dots">
								<ul id="home_slider_custom_dots" class="home_slider_custom_dots">
									<li class="home_slider_custom_dot active">01.</li>
									<li class="home_slider_custom_dot">02.</li>
									<li class="home_slider_custom_dot">03.</li>
								</ul>
							</div>
						</div>
					</div>
				</div>	
			</div>

		</div>
	</div>

	<!-- Ads -->

	<div class="avds">
		<div class="avds_container d-flex flex-lg-row flex-column align-items-start justify-content-between">
			<div class="avds_small">
				<div class="avds_background" style="background-image:url(images/avds_small.jpg);margin-top: 10px;"></div>
				<div class="avds_small_inner">
				
					<div class="avds_small_content">
						<div class="avds_title">axolotl</div>
						<div class="avds_link"><a href="{{url ('/list')}}">See More</a></div>
					</div>
				</div>
			</div>
			<div class="avds_large">
				<div class="avds_background" style="background-image:url(images/avds_large.jpg)"></div>
				<div class="avds_large_container">
					<div class="avds_large_content">
						<div class="avds_title">Professional Axolotl seller</div>
						<div class="avds_text">masih ragu dengan axotic farm? ngapain coba, kita punya spesialis pada bidang ikan hias yang mana bakal menjaga kualitas axolotl kamu</div>
						<div class="avds_link avds_link_large"><a href="{{url ('/list')}}">See More</a></div>
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
					
					<div class="product_grid">
						@if(count($product)>0)
                        @foreach ($product as $product)
						<!-- Product -->
						<div class="product">
							<a href="{{url('/detailproduk/'.$product->id)}}">
							<div class="product_image"><img src="http://127.0.0.1:8000/storage/file/{{$product->photo}}" alt=""></div>
						@if($product->stok == 1)
							<div class="product_extra product_sale"><a href="categories.html">ada</a></div>
						
						@else
							<div class="product_extra product_hot"><a href="categories.html">kosong</a></div>

                        @endif

							<div class="product_content">
								<div class="product_title">
							<a href="{{url('/detailproduk/'.$product->id)}}">
									{{$product->nama}}
							</a>
								</div>
								<div class="product_price">Rp.{{$product->harga}}</div>
							</div>
							</a>
						</div>
						@endforeach
                        @endif
					</div>
						
				</div>
			</div>
		</div>
	</div>

	<!-- Ad -->

	<!-- <div class="avds_xl">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="avds_xl_container clearfix">
						<div class="avds_xl_background" style="background-image:url(images/avds_xl.jpg)"></div>
						<div class="avds_xl_content">
							<div class="avds_title">Amazing Devices</div>
							<div class="avds_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus.</div>
							<div class="avds_link avds_xl_link"><a href="categories.html">See More</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<!-- Icon Boxes -->

	<div class="icon_boxes">
		<div class="container">
			<div class="row icon_box_row">
				
				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_1.svg" alt=""></div>
						<div class="icon_box_title">Garansi pengiriman</div>
						<div class="icon_box_text">
							<p>yup bener banget, kita memiliki garansi pengiriman jika axolotl mati saat pengiriman. caranya hanya kirim foto/video unboxing kamu dan kirim pada customer service kami</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_2.svg" alt=""></div>
						<div class="icon_box_title">bonus pembelian</div>
						<div class="icon_box_text">
							<p>siapa sih yang gak pengen bonusan?, tenang aja setiap pembelian axolotl di axotic farm akan mendapatkan thermometer & guide pemeliharaan axolotl.</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_3.svg" alt=""></div>
						<div class="icon_box_title">24h Fast Support</div>
						<div class="icon_box_text">
							<p>kita siap bales kapan aja bahkan lebih cepat saat kamu bales pesan gebetan kamu.</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Newsletter -->

@endsection