@extends('client.layout.index')
@section('content_client')

<!-- Contact Content -->
<div class="contact_content">
		
		<div class="container">
			<div class="row">
				
				<div class="col-lg-8">
					<div class="contact_main_content">
							@if(session('mess_danger'))
							<div class="alert alert-danger">
								{{ session('mess_danger') }}
							</div>
							@endif
							@if(session('mess_sus'))
							<div class="alert alert-success">
								{{ session('mess_sus') }}
							</div>
							@endif
						<div class="contact_subtitle">contact us</div>
						
						<!-- Contact Us Form -->
						<div class="contact_form_container">
							<form id="reply_form" action="client/email" method="POST">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div>
									<input id="contact_form_name" name="name" class="input_field contact_form_name" type="text" placeholder="Name" required="required" data-error="Name is required.">
									<input id="contact_form_email" name="email" class="input_field contact_form_email" type="email" placeholder="E-mail" required="required" data-error="Valid email is required.">
									<input id="contact_form_subject" name="subject" class="input_field contact_form_subject" type="text" placeholder="Subject" required="required" data-error="Subject is required.">
									<textarea id="contact_form_message" name="content" class="text_field contact_form_message" name="message"  placeholder="Message" rows="4" required data-error="Please, write us a message."></textarea>
								</div>
								<div>
									<button id="contact_form_submit" type="" class="contact_submit_btn trans_300" value="">
										send<img src="client_aset/images/arrow_right.svg" alt="">
									</button>
								</div>
									
								<div hidden="hidden">
									<input type="text" name="toemail" value="{{ ($cont->prior == 1) ? $mler->email :0}}">
								</div>
							</form>
						</div>

					</div>
				</div>
				<!-- Sidebar -->
				<div class="col-lg-4">
					<div class="contact_sidebar">
						
						<!-- Contact Info -->
						<div class="sidebar_section">
							<div class="sidebar_contact_info">
								<div class="sidebar_title">Thông tin liên hệ</div>
								<ul>
									<li> {{ ($cont->prior == 1) ? $mler->last_name.' '.$mler->frist_name :0}}										
									<br>
									{{ ($cont->prior == 1) ? $mler->address :0}}</li>
									<li>{{ ($cont->prior == 1) ? $mler->phone :0}}</li>
									<li>{{ ($cont->prior == 1) ? $mler->email :0}}</li>
								</ul>
							</div>
						</div>

					</div>
				</div>

			</div>

			<!-- Google Map Container -->

			

		</div>
	</div>

	<!-- Contact -->

	{{-- <div class="contact prlx_parent">
		<div class="contact_background prlx" style="background-image:url(client_asset/images/contact_background.jpg)"></div>
		<div class="contact_shapes"><img src="client_asset/images/contact_shape.png" alt=""></div>
		<div class="container">
			
			<div class="row">
				<div class="col-lg-6 offset-lg-3 text-center section_title contact_title">
					<h2>let s work together<span>z</span></h2>
				</div>
			</div>
			
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center contact_text">
					<p>Dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, quam tincidunt venen atis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam.</p>
					<div class="button contact_button">
						<a href="contact.html" class="d-flex flex-row align-items-center justify-content-center">contact<img src="images/arrow_right.svg" alt=""></a>
					</div>
				</div>
			</div>
		</div>
	</div> --}}


<script src="client_asset/js/contact_custom.js"></script>
<script>
    $.ajax({
        url: "https://maps.googleapis.com/maps/api/geocode/json",
        data: {
            'key': 'AIzaSyAr3h47KsMPXAQHpDQ1YtLtT0Q0Z_WQ9IA',
            'address': '430 Hà Duy Phiên, ấp 1 xã Bình Mỹ, Huyện Củ CHi, Tp.HCM',
            'sensor': 'false',
            'fbclid': 'IwAR2692wZ6RY4uflXENB2qROCL9hxD1YnokR75M_MJzBT9MuQ-pxE8RBWcOQ',
        },
        cache: false,
        type: "GET",
        success: function(response) {
			console.log(response.results);
        },
        error: function(xhr) {
			alert('False');
        }
    });
</script>
@endsection