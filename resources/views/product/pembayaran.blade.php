@extends('home.app')

@section('css')
<link rel="stylesheet" type="text/css" href="{{url('styles/contact.css')}}">
<link rel="stylesheet" type="text/css" href="{{url('styles/contact_responsive.css')}}">
@endsection

@section('content')
<!-- Home -->
<div class="modal"><!-- Place at bottom of page --></div>
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
            @if(count($penjualan)>0)
			@foreach($penjualan as $penjualans)
				<!-- Get in touch -->
				<div class="col-lg-8 contact_col">
					<div class="get_in_touch">
                        <div class="section_title">| kode pemesanan : <b>{{$penjualans->code}}</b></div>
                        <p style="color:red;">tolong kode diatas disimpan dan dijaga baik baik.</p>
                    </div>
                    <div class="get_in_touch">
                        <div class="section_title">| total tagihan : <b>Rp. {{$penjualans->total}}</b></div>
                        <?php 
                        $new_time = date($penjualans->updated_at, strtotime('+3 hours'));
                        
                        ?>
                        <div class="section_title">| transfer sebelum : <b>{{ date("d-M-Y h:i:s", strtotime($new_time))}} (3 jam)</b></div>
                        <div class="table-responsive">
                            <!--Table-->
                            <table class="table table-striped">

                            <!--Table head-->
                            <thead>
                                <tr>
                                <th>product</th>
                                <th>kode</th>
                                <th>harga</th>
                                </tr>
                            </thead>
                            <!--Table head-->

                            <!--Table body-->
                            <tbody>
                            @if(isset($product))
			                @foreach($product as $products)
                                <tr>
                                
                                <td>{{$products->nama}}</td>
                                <td>{{$products->kode}}</td>
                                <td>{{$products->harga}}</td>
                                </tr>
                                @endforeach
					            @endif
                            </tbody>
                            <!--Table body-->


                            </table>
                            <!--Table-->
                            </div>
                    </div>
                </div>
                </div>
                <div class="row">

                <!-- Contact Info -->
                
				<div class="col-lg-12 contact_col" style="margin-top:30px;">
					<div class="contact_info">
                    <hr>
                        <div class="contact_info_section" style="margin-top:30px;">
                        
                            <div class="contact_info_title">> status pembayaran</div>
                           
							<ul style="margin-top:0px;margin-left:10px;">
                            <form id="bayar">
								<li style="width: 100%;">upload bukti pembayaran: <input required style="margin-top:30px;margin-left:30px;margin-bottom:30px;" type="file" name="buktibayar" id="buktibayar"></li>
								<span id="tunggu" class="loading">sedang mengupload bukti bayar...</span>
                                <input type="hidden" name="code" id="code" value="{{$penjualans->code}}">
                                <li style="width: 100%;"><input value="kirim bukti pembayaran" type="submit" id="kirim"></li>
                                </form>
                                @if($penjualans->status == 0)                               
								<li>status pembayaran: <span class="badge badge-danger" style="color:white;" >belum mengirim bukti pembayaran</span></li>
                                @endif
                                @if($penjualans->status == 1)                               
								<li>status pembayaran: <span class="badge badge-warning" style="color:white;" >menunggu approval</span></li>
                                @endif
                                @if($penjualans->status == 2)                               
								<li>status pembayaran: <span class="badge badge-success" style="color:white;" >pembayaran diterima</span></li>
                                @endif
                                @if($penjualans->status == 3)                               
								<li>status pembayaran: <span class="badge badge-danger" style="color:white;" >pembayaran ditolak</span></li>
                                @endif
                            </ul><br>
                            <p style="margin-top:0px;margin-left:10px;">
                            transfer pada salah satu rekening berikut:<br>
                            - BNI 866971228 an rafly lesmana<br>
                            - BCA 0112625907 an rafly lesmana<br><br>
                            Axolotl akan melalui proses karantina <b>2x24 jam</b> setelah transfer untuk keamanan pengiriman.<br><br>
                            GARANSI 100% (s&k berlaku)<br>
                            <b>1.</b> foto paket saat sampai<br>
                            <b>2.</b>  vidio kan dari awal sampai hingga dibuka isinya<br>
                            <b>3.</b>  kirim ke whatsapp admin atau story langsung tag ke instagram kita<br>
                            <b>4.</b>  admin akan konfirmasi 1x24 jam untuk mengurus garansi<br>
                            </p>
                        </div>
                        <hr>
						<div class="contact_info_section" style="margin-top:30px;">
							<div class="contact_info_title">> pengiriman & karantina</div>
							<ul style="margin-top:0px;margin-left:10px;">
                           
                            @if($resi)
			                @foreach($resi as $resis)

                            <li>nomor resi: <span class="badge badge-success" style="color:white;">{{ $resis}}</span></li>
                            @endforeach

                            @else
								<li>nomor resi: <span class="badge badge-danger" style="color:white;">belum dikirim</span></li>
                            @endif
                            </ul>
                            <br>
                            <div class="table-responsive">
                            <!--Table-->
                            <table class="table table-striped">

                            <!--Table head-->
                            <thead>
                                <tr>
                                <th>tanggal</th>
                                <th>status Axolotl</th>
                                <th>deskripsi</th>
                                </tr>
                            </thead>
                            <!--Table head-->

                            <!--Table body-->
                            <tbody>
                            @if(isset($pembayarans))
			                @foreach($pembayarans as $pembayaranss)
                                <tr>
                                
                                <td>{{$pembayaranss->created_at}}</td>
                                <td>{{$pembayaranss->status}}</td>
                                <td>{{$pembayaranss->deskripsi}}</td>
                                </tr>
                                @endforeach
					            @endif
                            </tbody>
                            <!--Table body-->


                            </table>
                            <!--Table-->
                            </div>
                        </div>

                        <hr>
                        @endforeach
                        @else
                        <div class="contact_info_title">> kode pemesanan tidak ditemukan</div>
						</div>
                           
					    @endif
						<div class="contact_info_section">
							<div class="contact_info_title">Customer service</div>
							<ul>
								<li>whatsapp: <span>+53 345 7953 3245</span></li>
								<li>instagram: <span>yourmail@gmail.com</span></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
    <script src="{{ url('js/jquery-3.2.1.min.js')}}"></script>

<script>

$('#bayar').submit(function(e) {
    // alert();
    e.preventDefault();
    // alert();
   var formData = new FormData();

   formData.append('bukti', $('input[type=file]')[0].files[0]);
   formData.append("code",$('#code').val());


    $.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

    });

    $('#tunggu').removeClass("loading");

    $.ajax({

    type:'POST',
    processData: false,
    contentType: false,
    fileElementId: "customFile",
    url: "/uploadbukti",
    data:formData,
    ajaxStart: function() { alert("loading");    },
    ajaxStop: function() { $body.removeClass("loading"); } ,   
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