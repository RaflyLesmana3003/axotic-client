@extends('home.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('styles/cart.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('styles/cart_responsive.css')}}">
@endsection

@section('content')
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
										<li><a href="categories.html">Categories</a></li>
										<li>Shopping Cart</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Cart Info -->

	<div class="cart_info">
		<div class="container">
			<div class="row">
				<div class="col">
					<!-- Column Titles -->
					<div class="cart_info_columns clearfix">
						<div class="cart_info_col cart_info_col_product">Produk</div>
						<div class="cart_info_col cart_info_col_price">Harga</div>
						<div class="cart_info_col cart_info_col_total">Stok</div>
						<div class="cart_info_col cart_info_col_quantity">option</div>
					</div>
				</div>
			</div>
			<div class="row cart_items_row">
				<div class="col">
					@if(isset($item))
					@foreach($item as $items)
					<!-- Cart Item -->
					<div v-for="item in items" class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
						<!-- Name -->
						<div class="cart_item_product d-flex flex-row align-items-center justify-content-start" style="margin-bottom:50px;">
							<div class="cart_item_image">
								<div><img src="http://127.0.0.1:8000/storage/file/{{$items->attributes['photo']}}" width="100px" alt=""></div>
							</div>
							<div class="cart_item_name_container">
								<div class="cart_item_name"><a href="#">{{$items->name}}</a></div>
								<div class="cart_item_edit"><a href="#">{{$items->attributes['kode']}}</a></div>
							</div>
						</div>
						<!-- Price -->
						<div class="cart_item_price">Rp.{{number_format($items->price, 0, ".", ".")}}</div>
						<!-- Quantity -->
						<div class="cart_item_total">
							@if($items->quantity == 1)
							<span class="status--process">{{"tersedia"}}</span>                                                
							@else
							<span class="status--denied">{{"kosong"}}</span>
							@endif
						</div>
						<div class="cart_info_col_quantity">							
						<div class="button clear_cart_button"><a onclick="hapus({{$items->id}})">hapus product</a></div>
						</div>
					</div>
					
					@endforeach
					@endif
				</div>
			</div>	
			<div class="row row_cart_buttons">
				<div class="col">
					<div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start" style="margin-bottom:-150px;">
						<div class="cart_buttons_right ml-lg-auto">
						<div class="button clear_cart_button"><a href="{{url ('/list')}}">Continue shopping</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="row row_extra" style="margin-top:-20px;">
				<div class="col-lg-4">
					
				</div>

				<div class="col-lg-6 offset-lg-2">
					<div class="cart_total">
						<div class="section_title">Cart total</div>
						<div class="section_subtitle">Final info</div>
						@if(isset($data))
						<div class="cart_total_container">
							<ul>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Subtotal</div>
									<div class="cart_total_value ml-auto">Rp.{{number_format($data[0]['subtotal'], 0, ".", ".")}}</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Pengiriman dan karantina</div>
									<div class="cart_total_value ml-auto">Rp.{{number_format($data[0]['ongkir'], 0, ".", ".")}}</div>
								</li>
								<li class="d-flex flex-row align-items-center justify-content-start">
									<div class="cart_total_title">Total</div>
									<div class="cart_total_value ml-auto">Rp.{{number_format($data[0]['total'], 0, ".", ".")}}</div>
								</li>
							</ul>
						</div>
						@endif
						@if($item != null)
						<div class="button checkout_button" style="color:black;"><a href="{{url('checkout')}}">Proceed to checkout</a></div>
						
						@else
						<div class="button checkout_button"><a onclick="alert('cart kosong')">Proceed to checkout</a></div>

						@endif
					</div>
				</div>
			</div>
		</div>		
	</div>

	<script>
	 function hapus(id) {
       var formData = new FormData();

        formData.append("id",id);

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
        url: "/delete",
        data:formData,
        success:function(data){
         window.location.href = '{{url('/cartpage')}}';
        },
          error: function(file, response)
          {

         
          }

        });

    };
	</script>

@endsection