@extends('home.app')

@section('css')
<link rel="stylesheet" type="text/css" href="styles/checkout.css">
<link rel="stylesheet" type="text/css" href="styles/checkout_responsive.css">
@endsection

@section('content')
	<!-- Menu -->

	<div class="menu menu_mm trans_300">
		<div class="menu_container menu_mm">
			<div class="page_menu_content">
							
				<div class="page_menu_search menu_mm">
					<form action="#">
						<input type="search" required="required" class="page_menu_search_input menu_mm" placeholder="Search for products...">
					</form>
				</div>
				<ul class="page_menu_nav menu_mm">
					<li class="page_menu_item has-children menu_mm">
						<a href="index.html">Home<i class="fa fa-angle-down"></i></a>
						<ul class="page_menu_selection menu_mm">
							<li class="page_menu_item menu_mm"><a href="categories.html">Categories<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="product.html">Product<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="cart.html">Cart<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="checkout.html">Checkout<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="contact.html">Contact<i class="fa fa-angle-down"></i></a></li>
						</ul>
					</li>
					<li class="page_menu_item has-children menu_mm">
						<a href="categories.html">Categories<i class="fa fa-angle-down"></i></a>
						<ul class="page_menu_selection menu_mm">
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
							<li class="page_menu_item menu_mm"><a href="categories.html">Category<i class="fa fa-angle-down"></i></a></li>
						</ul>
					</li>
					<li class="page_menu_item menu_mm"><a href="index.html">Accessories<i class="fa fa-angle-down"></i></a></li>
					<li class="page_menu_item menu_mm"><a href="#">Offers<i class="fa fa-angle-down"></i></a></li>
					<li class="page_menu_item menu_mm"><a href="contact.html">Contact<i class="fa fa-angle-down"></i></a></li>
				</ul>
			</div>
		</div>

		<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>

		<div class="menu_social">
			<ul>
				<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
				<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
			</ul>
		</div>
	</div>
	
	<!-- Home -->

	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url({{url('images/categories.jpeg')}})"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="breadcrumbs">
									<ul>
										<li><a href="index.html">Home</a></li>
										<li><a href="cart.html">Shopping Cart</a></li>
										<li>Checkout</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Checkout -->
	
	<div class="checkout">
		<div class="container">
			<div class="row">

				<!-- Billing Info -->
				<div class="col-lg-6">
					<div class="billing checkout_section">
						<div class="section_title">Billing Address</div>
						<div class="section_subtitle">Enter your address info</div>
						<div class="checkout_form_container">
							<form id="checkout_form" class="checkout_form">
								<div class="row">
									<div class="col-xl-6">
										<!-- Name -->
										<label for="checkout_name">First Name*</label>
										<input type="text" id="checkout_name" class="checkout_input" required>
									</div>
									<div class="col-xl-6 last_name_col">
										<!-- Last Name -->
										<label for="checkout_last_name">Last Name*</label>
										<input type="text" id="checkout_last_name" class="checkout_input" required>
									</div>
								</div>
								<div>
									<!-- Phone no -->
									<label for="checkout_phone">Phone no*</label>
									<input type="phone" id="checkout_phone" class="checkout_input" required>
								</div>
								<div>
									<!-- Email -->
									<label for="checkout_email">Email Address*</label>
									<input type="email" id="checkout_email" class="checkout_input" required>
								</div>
								<div>
									<!-- Address -->
									<label for="checkout_address">Address*</label>
									<input type="text" id="checkout_address" class="checkout_input" required>
									<input type="text" id="checkout_address_2" class="checkout_input checkout_address_2">
								</div>
								<div class="checkout_extra">
									<div>
										<input type="checkbox" id="checkbox_terms" name="regular_checkbox" class="regular_checkbox" checked="checked">
										<label for="checkbox_terms"><img src="images/check.png" alt=""></label>
										<span class="checkbox_title">Terms and conditions</span>
									</div>
								</div>
								
							</form>
						</div>
					</div>
				</div>

				<!-- Order Info -->

				<div class="col-lg-6">
					<div class="order checkout_section">
						<div class="section_title">Your order</div>
						<div class="section_subtitle">Order details</div>

						<!-- Order details -->
						<div class="order_list_container">
							<div class="order_list_bar d-flex flex-row align-items-center justify-content-start">
								<div class="order_list_title"><strong>Product</strong></div>
								<div class="order_list_value ml-auto"><strong>Total</strong></div>
							</div>
							<ul class="order_list">
							@if(isset($item))
							@foreach($item as $items)
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">{{$items->name}} ({{$items->attributes['kode']}})</div>
									<div class="order_list_value ml-auto">Rp.{{number_format($items->price, 0, ".", ".")}}</div>
								</li>
								@endforeach
								@endif
								<hr>
								@if(isset($data))
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Subtotal</div>
									<div class="order_list_value ml-auto">Rp.{{number_format($data[0]['subtotal'], 0, ".", ".")}}</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Pengiriman pulau jawa<br>(4-7hari)</div>
									<div class="order_list_value ml-auto">Rp.{{number_format($data[0]['ongkir'], 0, ".", ".")}}</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="order_list_title">Total</div>
									<div class="order_list_value ml-auto">Rp.{{number_format($data[0]['total'], 0, ".", ".")}}</div>
									<input type="hidden" id="total" value='{{number_format($data[0]["total"], 0, ".", ".")}}'>
								</li>
								@endif
							</ul>
						</div>
						<div class="order_text">
						Axolotl akan melalui proses karantina <b>2x24 jam</b> setelah transfer untuk keamanan pengiriman.<br><br>
                            GARANSI 100% (s&k berlaku)<br>
                            <b>1.</b> foto paket saat sampai<br>
                            <b>2.</b>  vidio kan dari awal sampai hingga dibuka isinya<br>
                            <b>3.</b>  kirim ke whatsapp admin atau story langsung tag ke instagram kita<br>
                            <b>4.</b>  admin akan konfirmasi 1x24 jam untuk mengurus garansi<br>
                            </p>
							</div>
						<input form="checkout_form" class="button order_button" type="submit" value="Place Order"></input>
						<!-- Payment Options -->
						<div class="payment">
							<div class="payment_options">
								<!-- <label class="payment_option clearfix">Paypal
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
								<label class="payment_option clearfix">Cach on delivery
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label>
								<label class="payment_option clearfix">Credit card
									<input type="radio" name="radio">
									<span class="checkmark"></span>
								</label> -->
								<!-- <label class="payment_option clearfix">Direct bank transfer
									<input type="radio" checked="checked" name="radio">
									<span class="checkmark"></span>
								</label> -->
							</div>
						</div>

						<!-- Order Text -->
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="{{ url('js/jquery-3.2.1.min.js')}}"></script>

	<script>

	
	$('#checkout_form').submit(function(e) {
		e.preventDefault();
		// alert();
       var formData = new FormData();

        formData.append("nama",$('#checkout_name').val() +' '+ $('#checkout_last_name').val());
        formData.append("nomor",$('#checkout_phone').val());
        formData.append("email",$('#checkout_email').val());
        formData.append("total",$('#total').val());
        formData.append("alamat",$('#checkout_address_2').val() +' '+ $('#checkout_address').val());

        $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

        });



        $.ajax({

        type:'POST',
        processData: false,
    contentType: false,
        fileElementId: "customFile",
        url: "/order",
        data:formData,
        success:function(data){
         window.location.href = "{{url('/pembayaran')}}/"+data;
        },
          error: function(file, response)
          {

         
          }

        });
	});
	</script>
@endsection