@extends('home.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{ url('styles/product.css')}}">
<link rel="stylesheet" type="text/css" href="{{ url('styles/product_responsive.css')}}">
@endsection
@section('content')

<?php
    function FunctionName($data)
    {
        // if (is_array($data))
        //     {
        //     echo "found";
        //     }
        //     else
        //     {
        //     echo "not found";
        //     }
        try {
            $quill = new \DBlackborough\Quill\Render($data);
            $result = $quill->render();
        } catch (\Exception $e) {
            // echo "cok";
        }

        return $result;
    }?>

	<!-- Home -->
@if(count($product)>0)
                    @foreach ($product as $product)
	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image:url({{url('images/categories.jpeg')}})"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">{{$product->nama}}<span>.</span></div>
								<div class="home_text"><p>pilihan yang bagus</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Product Details -->

	<div class="product_details">
		<div class="container">
			<div class="row details_row"id="app">
					
				<!-- Product Image -->
				<div class="col-lg-6">
					<div class="details_image">
						<div class="details_image_large"><img src="http://127.0.0.1:8000/storage/file/{{$product->photo}}" alt=""><!-- <div class="product_extra product_new"><a href="categories.html">New</a></div> --></div>
						<div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
							<div class="details_image_thumbnail active" data-image="http://127.0.0.1:8000/storage/file/{{$product->photo}}"><img src="http://127.0.0.1:8000/storage/file/{{$product->photo}}" alt=""></div>
							<div class="details_image_thumbnail" data-image="http://127.0.0.1:8000/storage/file/{{$product->photo1}}"><img src="http://127.0.0.1:8000/storage/file/{{$product->photo1}}" alt=""></div>
							<div class="details_image_thumbnail" data-image="http://127.0.0.1:8000/storage/file/{{$product->photo2}}"><img src="http://127.0.0.1:8000/storage/file/{{$product->photo2}}" alt=""></div>						</div>
					</div>
				</div>

				<!-- Product Content -->
				<div class="col-lg-6">
					<div class="details_content">
						<div class="details_name">{{$product->nama}}</div>
						<div class="details_price">Rp.{{$product->harga}}</div>
						<br>
						<br>
						<div>kode : <span class="badge badge-secondary">{{$product->kode}}</span></div>
						
						<!-- In Stock -->
						@if($product->stok == 1)
						<span class="">stok :</span>

                            <span class="badge badge-success">tersedia</span>                            
                       @else
                      	 	
							<span class="">stok :</span>

                            <span class="badge badge-danger">kosong</span> 
                       @endif
						
						<div class="details_text">
							<?php
				            echo FunctionName($product->desc);
				            ?>
						</div>

						<!-- Product Quantity -->
                            <input  class="form-control" id="id" value="{{$product->id}}" type="hidden">
                            <input  class="form-control" id="nama" value="{{$product->nama}}"type="hidden">
                            <input  class="form-control" id="harga" value="{{$product->harga}}"type="hidden">
                            <input  class="form-control" id="kode" value="{{$product->kode}}"type="hidden">
                            <input  class="form-control" id="stok" value="{{$product->stok}}"type="hidden">
                            <input  class="form-control" id="photo" value="{{$product->photo}}"type="hidden">

						<div class="product_quantity_container">
                            <div class="button cart_button"><a onclick="tambahbenefit()" >Add to cart</a></div>
						</div>


						<!-- Share -->
						
					</div>
				</div>
				
			</div>

			<!-- <div class="row description_row">
				<div class="col">
					<div class="description_title_container">
						<div class="description_title">Description</div>
						<div class="reviews_title"><a href="#">Reviews <span>(1)</span></a></div>
					</div>
					<div class="description_text">
						<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst. Suspendisse ultrices mauris diam. Nullam sed aliquet elit. Mauris consequat nisi ut mauris efficitur lacinia.</p>
					</div>
				</div>
			</div> -->
		</div>
	</div>
@endforeach
				@endif
	<!-- Products -->

	<div class="products">
		
	</div>

<script src="{{ url('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{ url('js/product.js')}}"></script>
<script>
        function tambahbenefit() {
       var formData = new FormData();

        formData.append("id",$('#id').val());
        formData.append("nama",$('#nama').val());
        formData.append("harga",$('#harga').val());
        formData.append("kode",$('#kode').val());
        formData.append("stok",$('#stok').val());
        formData.append("photo",$('#photo').val());

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
        url: "/cart",
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
