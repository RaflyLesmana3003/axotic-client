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
				
                </div>
                        <hr>
                        
						<div class="contact_info_section">
							<div class="contact_info_title">Information</div>
							<ul>
                            <li>whatsapp: <span>+53 345 7953 3245</span></li>
							<li>instagram: <span>yourmail@gmail.com</span></li>
							<li>alamat: <span>perum bumi palapa,j9 kota malang</span></li>
							</ul>
						</div>
                        <hr>
                        
                        
					</div>
				</div>
			</div>
			
		</div>
	</div>
	
@endsection