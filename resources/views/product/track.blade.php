@extends('home.app')

@section('css')
<link rel="stylesheet" type="text/css" href="styles/contact.css">
<link rel="stylesheet" type="text/css" href="styles/contact_responsive.css">
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
										<li>Contact</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact -->
	
	<div class="contact">
		<div class="container">
			<div class="row">

				<!-- Get in touch -->
				<div class="col-lg-8 contact_col">
					<div class="get_in_touch">
						<div class="section_title">informasi pemesanan</div>
						<div class="contact_form_container">
							<form id="contact_form" class="contact_form">
								<div>
									<!-- Subject -->
									<label for="contact_company">masukkan kode pemesanan</label>
									<input type="text" id="contact_company" class="contact_input" required>
								</div>
								<button class="button contact_button" form="contact_form" type="submit"><span>kirim</span></button>
							</form>
						</div>
					</div>
                </div>
                </div>
                        <hr>
                        
						<div class="contact_info_section">
							<div class="contact_info_title">Information</div>
							<ul>
								<li>Phone: <span>+53 345 7953 3245</span></li>
								<li>Email: <span>yourmail@gmail.com</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
	<script src="{{ url('js/jquery-3.2.1.min.js')}}"></script>

	<script>

	
	$('#contact_form').submit(function(e) {
		e.preventDefault();

         window.location.href = "{{url('/pembayaran')}}/"+$('#contact_company').val();
       
	});
	</script>
@endsection