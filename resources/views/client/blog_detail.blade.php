
@extends('client.layout.index')
@section('content_client')
<!-- Page Top -->

<div class="home prlx_parent">
    <!-- Parallax Background -->
    <div class="home_background prlx" style="background-image:url(client_asset/images/blog_background.jpg)"></div>
    <div class="services_page_shapes" style="background-image:url(client_asset/images/services_page_shapes.png)"></div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="home_content">
                    <h1>Blog </h1>
                    <span>read the news</span>
                </div>
            </div>
        </div>
    </div>
</div>	

<!-- Blog Content -->

<div class="blog_content">
    
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_main_content">
                    <!-- Blog Post -->
                    <article class="blog_post">
                        <div class="blog_post_image">
                            @if($ctl->motels->image != '')
                                <div class="blog_post_image_background" style="background-image:url(moteler_asset/images/{{ $ctl->motels->image }})"></div>
                            @else
                                <div class="blog_post_image_background" style="background-image:url(client_asset/images/blog_1.jpg)"></div>
                            @endif
                        </div>
                        <h3 class="blog_post_title">{{ $ctl->motels->name }}</h3>
                        <div class="blog_post_meta">
                            <span class="blog_post_author">{{ $ctl->catalogue->name }}</span>
                            <span class="blog_post_category">{{ $ctl->area }} m<sup>2</sup></span>
                            <span class="blog_post_comments">{{ $ctl->price }} vnd</span>
                        </div>
                        <div class="blog_post_text">
                            <p>Vị tri: {{ $ctl->motels->address }}</p>
                            <p>Mô tả: {{ $ctl->motels->description }}
                            </p>
                        </div>
                    <!-- Blog Post Comments -->
                    </article>
                </div>
                <!-- map -->
                <div class="row">
                    <div id="map"  style="width: 100%;height: 300px; background-color: #b3ecff;">
                        Hiển thị bản đồ
                    </div>
                    <script>
                        // The following example creates complex markers to indicate hostels near
                        // Sydney, NSW, Australia. Note that the anchor is set to (0,32) to correspond
                        // to the base of the flagpole.
                        function initMap() {
                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 12,
                                center: {lat: 10.972396, lng: 106.639338}
                            });

                            setMarkers(map);
                        }
                        // Data for the markers consisting of a name, a LatLng and a zIndex for the
                        // order in which these markers should display on top of each other.
                        var hostels = [
                            ['{!! $ctl->motels->name !!}', {!! $ctl->motels->longitude !!}, {!! $ctl->motels->latitude !!}]
                        ];
                        function setMarkers(map) {
                            var image = {
                                url: 'https://cdn3.iconfinder.com/data/icons/mapicons/icons/home.png',

                                //size: new google.maps.Size(20, 32),
                                // The origin for this image is (0, 0).
                                origin: new google.maps.Point(0, 0),
                                // The anchor for this image is the base of the flagpole at (0, 32).
                                anchor: new google.maps.Point(0, 32)
                            };
                            // Shapes define the clickable region of the icon. The type defines an HTML
                            // <area> element 'poly' which traces out a polygon as a series of X,Y points.
                            // The final coordinate closes the poly by connecting to the first coordinate.
                            var shape = {
                                coords: [1, 1, 1, 20, 18, 20, 18, 1],
                                type: 'poly'
                            };

                            for (var i = 0; i < hostels.length; i++) {
                                var beach = hostels[i];
                                var marker = new google.maps.Marker({
                                    position: {lat: beach[1], lng: beach[2]},
                                    map: map,
                                    icon: image,
                                    //shape: shape,
                                    title: beach[0],
                                    //zIndex: beach[3]
                                });
                            }
                        }
                    </script>
                    <!-- Key Google API -->
                    <script async defer
                            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCkE_1ZGM7SCsJ1O7BV5Jf754FUfUm4S_E&callback=initMap">
                    </script>
                  </div>
                <!-- end map -->
            </div>
            <!-- Sidebar -->
            <div class="col-lg-4">
                <div>
                    <div class="sidebar_title">Dịch vụ</div>	
                    <table class="table table-hover" style="margin-top: -50px;">
                        <thead>
                            <tr>
                                <th>Mục</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($sers as $ser)
                            @if($ser->name == 'Điện' || $ser->name == 'Nước')
                            <tr>
                                <td>{{ $ser->name }}</td>
                                <td>{{ $ser->price }}</td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- <hr> -->
                <div>
                    <div class="contact_main_content">	
                        <div class="sidebar_section">
                            <div class="sidebar_contact_info">
                                <div class="sidebar_title">Liên Hệ với chủ trọ</div>
                                <ul style="margin-top: -50px;">
                                    <li>{{ $mler->frist_name }} {{ $mler->last_name }}
                                        <br>
                                    {{ $mler->address }}</li>
                                    <li>{{ $mler->email }}</li>
                                    <li>{{ $mler->	phone }}</li>
                                </ul>
                            </div>
                        </div>
                        <!-- Contact Us Form -->
                        @if(session('mess_danger'))
							<div class="alert alert-danger">{{ session('mess_danger') }}</div>
                        @endif
                        @if(session('mess_sus'))
							<div class="alert alert-success">{{ session('mess_sus') }}</div>
                        @endif
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
                                    <input type="text" name="res" value="blog_detail">
                                    <input type="text" name="blog" value="{{ $ctl->id }}">
									<input type="text" name="toemail" value="{{ $mler->email }}">
								</div>
							</form>
						</div>
                    {{--<div>--}}
                        {{--<div class="sidebar_title">Liên quan</div>--}}

                        {{--<!-- gợi ý -->--}}
                    {{--</div>--}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script src="client_asset/js/blog_post_custom.js"></script>
<script src="client_asset/plugins/js-flickr-gallery-1.24/js-flickr-gallery.js"></script>
@endsection