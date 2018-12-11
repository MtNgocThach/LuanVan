@extends('client.layout.index')
@section('content_client')

<!-- Hero Slider -->
	
	{{--  <div class="home">  --}}
    <div class="row">
        <div id="map"  style="width: 100%; height: 700px; background-color: #b3ecff;">
            Hiển thị bản đồ
            
        </div>
        
    
        <script>

                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 12,
                        center: {lat: 10.972396, lng: 106.639338}
                    });

                    setMarkers(map);
                }

                // Data for the markers consisting of a name, a LatLng and a zIndex for the
								// order in which these markers should display on top of each other.
								var hostels = [];
								var a = {!! $mtls !!};

								a.map( m => {
									hostels.push([m.name, m.address, m.longitude, m.latitude, m.id_mler]);
								});

								{{-- console.log(hostels); --}}
								// m sua lai theo cai mau cua m la dc ok hiu
                {{-- var hostels = [
                    ['My home', 10.972396, 106.639338, 4],
                    ['Nhà trọ 1', 10.972072, 106.639932, 5],
                    ['Nhà trọ 2', 10.948250, 106.606161, 3]
                ]; --}}

                function setMarkers(map) {
                    
                    var image = {
                        url: 'https://cdn3.iconfinder.com/data/icons/mapicons/icons/home.png',
                        
                        //size: new google.maps.Size(20, 32),
                        // The origin for this image is (0, 0).
                        origin: new google.maps.Point(0, 0),
                        // The anchor for this image is the base of the flagpole at (0, 32).
                        anchor: new google.maps.Point(0, 32)
                    };
                    var shape = {
                        coords: [1, 1, 1, 20, 18, 20, 18, 1],
                        type: 'poly'
                    };

                    for (var i = 0; i < hostels.length; i++) {
                        var beach = hostels[i];
                        var marker = new google.maps.Marker({
                            position: {lat: beach[2], lng: beach[3]},
                            map: map,
                            icon: image,
                            //shape: shape,
                            title: 'Nhà trọ: ' + beach[0] + 'địa chỉ' + beach[1],
                            //zIndex: beach[3] 
                        });
                    }
                    
                }
        </script> 

        {{--  Key Google API  --}}
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1pOuUTX6QnoI9xABvyVgln3KekhynZYQ&callback=initMap">
        </script>
  	</div>
	{{--  </div>  --}}
    
    {{--  Lọc  --}}
	<div class="col-md-3" style="position:absolute; z-index: 1; top: 580px; right: 50px; background-color: grey; padding-bottom: 10px; border-radius: 5px">
			<form class="form-inline" role="form" action="client/trangchu" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<select class="col-md-5 col-sm-3" name="numpers" style="margin-left: 20px; margin-top: 10px; height: 35px ;border-radius: 3px">					
						<option value="">Số người</option>
						<option value="4">4</option>
						<option value="6">6</option> 
						<option value="8">8</option> 
				</select>

				<select class="col-md-5 col-sm-3" name="cata" style="margin-left: 20px; margin-top: 10px; height: 35px; border-radius: 3px">		
				
						<option value="">Loại Phòng</option>
						@foreach ($ctls as $ctl)	
							<option value="{{ $ctl->id }}">{{ $ctl->name }}</option>						
						@endforeach			
				</select>

				<select class="col-md-5 col-sm-3" name="price" style="margin-left: 20px; margin-top: 10px; height: 35px; border-radius: 3px">					
						<option value="">Giá</option>

						<option value="800000">800000-10000000 vnđ</option>
						<option value="1000000">1000000-1200000 vnđ</option>
						<option value="1200000">1200000-1500000 vnđ</option>
						<option value="1500000">Lớn hơn 1500000 vnđ</option>
				</select>
				<button type="" class="btn btn-success " style="margin-left: 20px; margin-top: 10px">Tìm kiếm ngay</button>
			</form> 
	</div>

	<!-- Features -->
    {{--    --}}
	<div class="features">
		<div class="container">
			<div class="row align-items-end">
				
				<!-- Features Item inform Hostel-->
				<div class="col-lg-4 features_col">
					<div class="features_item d-flex flex-column align-items-center justify-content-end text-center" style="background-color: #e6ffff">
						
						<div class="icon_container d-flex flex-column justify-content-end">
							<img src="client_asset/images/nhatro1.jpg" alt="" style="width: 200px;">
						</div>
						
						<h3>Nhà Trọ 1</h3>
						<h4>800000 vnđ</h4>
						<table class="table">
							<thead>
							    <tr>
							      <th scope="col">Diện tích</th>
							      <td>50 m2</td>
							    </tr>
						  	</thead>
						  <tbody>
						  	<tr>
							      <th scope="col">Điện</th>
							      <td>9000/kg</td>
							    </tr>
						    <tr>
						      <th scope="row">Nước</th>
						      <td>13000/kg</td>
						    </tr>
						    <tr>
						      <th scope="row">Môi trường</th>
						      <td>10000/tháng</td>
						    </tr>
						    <tr>
						      <th scope="row">Khác</th>
						      <td>...</td>
						    </tr>
						  </tbody>
						</table>
					</div>
					<a href="#" style="display: block;text-align: right;"><u><i>Read more</i></u></a>
				</div>
				
				<!-- Features Item inform Hostel-->
				<div class="col-lg-4 features_col">
					<div class="features_item d-flex flex-column align-items-center justify-content-end text-center" style="background-color: #e6ffff">
						
						<div class="icon_container d-flex flex-column justify-content-end">
							<img src="client_asset/images/nhatro1.jpg" alt="" style="width: 200px;">
						</div>
						<h3>Nhà Trọ 1</h3>
						<h4>800000 vnđ</h4>
						<table class="table">
							<thead>
							    <tr>
							      <th scope="col">Diện tích</th>
							      <td>50 m2</td>
							    </tr>
						  	</thead>
						  <tbody>
						  	<tr>
							      <th scope="col">Điện</th>
							      <td>9000/kg</td>
							    </tr>
						    <tr>
						      <th scope="row">Nước</th>
						      <td>13000/kg</td>
						    </tr>
						    <tr>
						      <th scope="row">Môi trường</th>
						      <td>10000/tháng</td>
						    </tr>
						    <tr>
						      <th scope="row">Khác</th>
						      <td>...</td>
						    </tr>
						  </tbody>
						</table>
					</div>					
					<a href="#" style="display: block;text-align: right;"><u><i>Read more</i></u></a>
				</div>
				
				<!-- Features Item inform Hostel-->
				<div class="col-lg-4 features_col">
					<div class="features_item d-flex flex-column align-items-center justify-content-end text-center" style="background-color: #e6ffff">
						
						<div class="icon_container d-flex flex-column justify-content-end">
							<img src="client_asset/images/nhatro1.jpg" alt="" style="width: 200px;">
						</div>
						<h3>Nhà Trọ 1</h3>
						<h4>800000 vnđ</h4>
						<table class="table">
							<thead>
							    <tr>
							      <th scope="col">Diện tích</th>
							      <td>50 m2</td>
							    </tr>
						  	</thead>
						  <tbody>
						  	<tr>
							      <th scope="col">Điện</th>
							      <td>9000/kg</td>
							    </tr>
						    <tr>
						      <th scope="row">Nước</th>
						      <td>13000/kg</td>
						    </tr>
						    <tr>
						      <th scope="row">Môi trường</th>
						      <td>10000/tháng</td>
						    </tr>
						    <tr>
						      <th scope="row">Khác</th>
						      <td>...</td>
						    </tr>
						  </tbody>
						</table>
					</div>
					<a href="#" style="display: block;text-align: right;"><u><i>Read more</i></u></a>
				</div>

			</div>
		</div>
	</div>

	<!-- About -->
    {{--  thông kê  --}}
	<div class="about prlx_parent">
		{{--  <!-- https://unsplash.com/@nativemello -->  --}}
		<div class="about_background prlx" style="background-image:url(client_asset/images/about_background.jpg)"></div>
		<div class="about_shapes"><img src="images/about_shapes.png" alt=""></div>

		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 text-center section_title">
					<h2>Thống Kê<span>z</span></h2>
				</div>
			</div>
			<div class="row">

				<div class="col-lg-6">
					<div class="about_text">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, 
							quam tincidunt venenatis ultrices, est libero mattis ante, ac consectetur diam neque eget quam. 
							Etiam feugiat augue et varius blandit. Praesent mattis, eros a sodales commodo, justo ipsum rutrum mauris, 
							sit amet egestas metus.
						</p>
						<img src="client_asset/images/signiture.png" alt="">
					</div>
				</div>

				<div class="col-lg-6">
					<div class="skills_container">
						<ul class="progress_bar_container col_12 clearfix">
							<li class="pb_item">
								<div id="skill_1_pbar" class="skill_bars" data-perc="0.85" data-name="skill_1_pbar"></div>
								<h5>800000-1000000</h5>
							</li>
							<li class="pb_item">
								<div id="skill_2_pbar" class="skill_bars" data-perc="1" data-name="skill_2_pbar"></div>
								<h5>1000000-1200000</h5>
							</li>
							<li class="pb_item">
								<div id="skill_3_pbar" class="skill_bars" data-perc="0.75" data-name="skill_3_pbar"></div>
								<h5>Trên 1200000</h5>
							</li>
						</ul>
					</div>
				</div>

			</div>
		</div>
		
		</div>
		
		<div class="contact prlx_parent">
				<div class="contact_background prlx" style="background-image:url(client_asset/images/contact_background.jpg)"></div>
				<div class="contact_shapes"><img src="client_asset/images/contact_shape.png" alt=""></div>
				<div class="container">
					
					<div class="row">
						<div class="col-lg-6 offset-lg-3 text-center section_title contact_title">
							<h2>Hãy cùng chúng tôi xây dựng hệ thống <span>nhà trọ</span></h2>
						</div>
					</div>
					
					<div class="row">
						<div class="col-lg-10 offset-lg-1 text-center contact_text">
							<p>Lien hệ với chúng tôi về nhà trọ của bạn.</p>
							<div class="button contact_button">
								<a href="client/contact" class="d-flex flex-row align-items-center justify-content-center">Liên hệ<img src="client_asset/images/arrow_right.svg" alt=""></a>
							</div>
						</div>
					</div>
				</div>
			</div>
    
@endsection