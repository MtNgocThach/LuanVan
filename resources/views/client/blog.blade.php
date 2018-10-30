@extends('client.layout.index')
@section('content_client')
    
<div class="blog_content">
		
		<div class="container">
			<div class="row">
				<!-- trệt -->
				
				@foreach ($ctl as $ctl)
					
				<div class="col-lg-4" style="background-color:#e6ffff;">
					<div class="blog_main_content">
						<b>{{ $ctl->name }}</b>
						<a href="client/blog_title/{{ $ctl->id }}" class="blog_post_link" style="margin-left: 180px;margin-right: 10px; display: inline; font-size: 10px;font-style: italic">Xem thêm
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									width="13px" height="7px" viewBox="0 0 13 7" enable-background="new 0 0 13 7" xml:space="preserve">
							<polygon id="arrow_poly_1" class="arrow_poly" fill="#FF4200" points="13,3.5 9,0 9,3 0,3 0,4 9,4 9,7 "/>
							</svg>
						</a>
						<!-- Mostel Post -->
						
							
						@foreach ($crs as $cr)						
							@if($ctl->id == $cr->id_ctlg)

							<article class="blog_post">
								<div class="blog_post_image">
									<div class="blog_post_image_background" style="background-image:url(client_asset/images/blog_1.jpg)"></div>
								</div>
								<h3 class="blog_post_title"><a href="client/blog_detail/{{ $cr->id }}">{{ $cr->motels->name }}</a></h3>
								<div class="blog_post_meta">
									<span class="blog_post_author">{{ $ctl->name }}</span>
									<span class="blog_post_category">{{ $cr->area }} m<sup>2</sup></span>
									<span class="blog_post_comments">{{ $cr->price }} vnđ</span>
								</div>
								<div class="blog_post_text">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, 
										quam tincidunt venen. Cras pharetra vel ex ut imperdiet. Lorem ipsum dolor sit amet, 
										consectetur adipiscing elit. Maecenas consectetur neque non felis placerat, 
										nec luctus nunc ullamcorper.
									</p>
								</div>
								<a href="client/blog_detail/{{ $cr->id }}" class="blog_post_link">chi tiết
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											width="13px" height="7px" viewBox="0 0 13 7" enable-background="new 0 0 13 7" xml:space="preserve">
									<polygon id="arrow_poly_1" class="arrow_poly" fill="#FF4200" points="13,3.5 9,0 9,3 0,3 0,4 9,4 9,7 "/>
									</svg>
								</a>
							</article>

							@endif
						@endforeach
					</div>					
				</div>
				
				@endforeach
				{{-- @endif --}}
				{{-- <!-- gác lửng -->
				<div class="col-lg-4" style="background-color:#e6ffff;border-left-color: white; border-left-style: solid">
					<div class="blog_main_content">
						<b>Gác lửng</b>
						<a href="client/blog_detail" class="blog_post_link" style="margin-left: 180px; display: inline; font-size: 10px;font-style: italic">Xem thêm
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									width="13px" height="7px" viewBox="0 0 13 7" enable-background="new 0 0 13 7" xml:space="preserve">
							<polygon id="arrow_poly_1" class="arrow_poly" fill="#FF4200" points="13,3.5 9,0 9,3 0,3 0,4 9,4 9,7 "/>
							</svg>
						</a>
						<!-- Mostel Post -->
						<article class="blog_post">
							<div class="blog_post_image">
								<div class="blog_post_image_background" style="background-image:url(client_asset/images/blog_1.jpg)"></div>
							</div>
							<h3 class="blog_post_title"><a href="client/blog_detail">nhà trọ sơn-hảo</a></h3>
							<div class="blog_post_meta">
								<span class="blog_post_author">Gác lững</span>
								<span class="blog_post_category">50m2</span>
								<span class="blog_post_comments">80000vnđ</span>
							</div>
							<div class="blog_post_text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, 
									quam tincidunt venen. Cras pharetra vel ex ut imperdiet. Lorem ipsum dolor sit amet, 
									consectetur adipiscing elit. Maecenas consectetur neque non felis placerat, 
									nec luctus nunc ullamcorper.
								</p>
							</div>
							<a href="client/blog_detail" class="blog_post_link">chi tiết
								<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									 width="13px" height="7px" viewBox="0 0 13 7" enable-background="new 0 0 13 7" xml:space="preserve">
								<polygon id="arrow_poly_1" class="arrow_poly" fill="#FF4200" points="13,3.5 9,0 9,3 0,3 0,4 9,4 9,7 "/>
								</svg>
							</a>
						</article>
						
						<!-- Mostel Post -->
						<article class="blog_post">
								<div class="blog_post_image">
									<div class="blog_post_image_background" style="background-image:url(client_asset/images/blog_1.jpg)"></div>
								</div>
								<h3 class="blog_post_title"><a href="client/blog_detail">nhà trọ sơn-hảo</a></h3>
								<div class="blog_post_meta">
									<span class="blog_post_author">Gác lững</span>
									<span class="blog_post_category">50m2</span>
									<span class="blog_post_comments">80000vnđ</span>
								</div>
								<div class="blog_post_text">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, 
										quam tincidunt venen. Cras pharetra vel ex ut imperdiet. Lorem ipsum dolor sit amet, 
										consectetur adipiscing elit. Maecenas consectetur neque non felis placerat, 
										nec luctus nunc ullamcorper.
									</p>
								</div>
								<a href="client/blog_detail" class="blog_post_link">chi tiết
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 width="13px" height="7px" viewBox="0 0 13 7" enable-background="new 0 0 13 7" xml:space="preserve">
									<polygon id="arrow_poly_1" class="arrow_poly" fill="#FF4200" points="13,3.5 9,0 9,3 0,3 0,4 9,4 9,7 "/>
									</svg>
								</a>
							</article>
							
						<!-- Mostel Post -->
						<article class="blog_post">
								<div class="blog_post_image">
									<div class="blog_post_image_background" style="background-image:url(client_asset/images/blog_1.jpg)"></div>
								</div>
								<h3 class="blog_post_title"><a href="client/blog_detail">nhà trọ sơn-hảo</a></h3>
								<div class="blog_post_meta">
									<span class="blog_post_author">Gác lững</span>
									<span class="blog_post_category">50m2</span>
									<span class="blog_post_comments">80000vnđ</span>
								</div>
								<div class="blog_post_text">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, 
										quam tincidunt venen. Cras pharetra vel ex ut imperdiet. Lorem ipsum dolor sit amet, 
										consectetur adipiscing elit. Maecenas consectetur neque non felis placerat, 
										nec luctus nunc ullamcorper.
									</p>
								</div>
								<a href="client/blog_detail" class="blog_post_link">chi tiết
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										 width="13px" height="7px" viewBox="0 0 13 7" enable-background="new 0 0 13 7" xml:space="preserve">
									<polygon id="arrow_poly_1" class="arrow_poly" fill="#FF4200" points="13,3.5 9,0 9,3 0,3 0,4 9,4 9,7 "/>
									</svg>
								</a>
							</article>
						

					</div>

					
				</div>
				<!-- 1 lầu -->
				<div class="col-lg-4" style="background-color:#e6ffff;border-left-color: white; border-left-style: solid">
					<div class="blog_main_content">
						<b>1 Lầu</b>
						<a href="client/blog_detail" class="blog_post_link" style="margin-left: 205px; display: inline; font-size: 10px;font-style: italic">Xem thêm
							<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
									width="13px" height="7px" viewBox="0 0 13 7" enable-background="new 0 0 13 7" xml:space="preserve">
							<polygon id="arrow_poly_1" class="arrow_poly" fill="#FF4200" points="13,3.5 9,0 9,3 0,3 0,4 9,4 9,7 "/>
							</svg>
						</a>
						<!-- Mostel Post -->
						<article class="blog_post">
							<div class="blog_post_image">
								<div class="blog_post_image_background" style="background-image:url(client_asset/images/blog_1.jpg)"></div>
							</div>
							<h3 class="blog_post_title"><a href="client/blog_detail">nhà trọ sơn-hảo</a></h3>
							<div class="blog_post_meta">
								<span class="blog_post_author">Gác lững</span>
								<span class="blog_post_category">50m2</span>
								<span class="blog_post_comments">80000vnđ</span>
							</div>
							<div class="blog_post_text">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, 
									quam tincidunt venen. Cras pharetra vel ex ut imperdiet. Lorem ipsum dolor sit amet, 
									consectetur adipiscing elit. Maecenas consectetur neque non felis placerat, 
									nec luctus nunc ullamcorper.
								</p>
							</div>
							<a href="client/blog_detail" class="blog_post_link">chi tiết
								<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
										width="13px" height="7px" viewBox="0 0 13 7" enable-background="new 0 0 13 7" xml:space="preserve">
								<polygon id="arrow_poly_1" class="arrow_poly" fill="#FF4200" points="13,3.5 9,0 9,3 0,3 0,4 9,4 9,7 "/>
								</svg>
							</a>
						</article>
						
						<!-- Mostel Post -->
						<article class="blog_post">
								<div class="blog_post_image">
									<div class="blog_post_image_background" style="background-image:url(client_asset/images/blog_1.jpg)"></div>
								</div>
								<h3 class="blog_post_title"><a href="client/blog_detail">nhà trọ sơn-hảo</a></h3>
								<div class="blog_post_meta">
									<span class="blog_post_author">Gác lững</span>
									<span class="blog_post_category">50m2</span>
									<span class="blog_post_comments">80000vnđ</span>
								</div>
								<div class="blog_post_text">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, 
										quam tincidunt venen. Cras pharetra vel ex ut imperdiet. Lorem ipsum dolor sit amet, 
										consectetur adipiscing elit. Maecenas consectetur neque non felis placerat, 
										nec luctus nunc ullamcorper.
									</p>
								</div>
								<a href="client/blog_detail" class="blog_post_link">chi tiết
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											width="13px" height="7px" viewBox="0 0 13 7" enable-background="new 0 0 13 7" xml:space="preserve">
									<polygon id="arrow_poly_1" class="arrow_poly" fill="#FF4200" points="13,3.5 9,0 9,3 0,3 0,4 9,4 9,7 "/>
									</svg>
								</a>
							</article>
							
						<!-- Mostel Post -->
						<article class="blog_post">
								<div class="blog_post_image">
									<div class="blog_post_image_background" style="background-image:url(client_asset/images/blog_1.jpg)"></div>
								</div>
								<h3 class="blog_post_title"><a href="client/blog_detail">nhà trọ sơn-hảo</a></h3>
								<div class="blog_post_meta">
									<span class="blog_post_author">Gác lững</span>
									<span class="blog_post_category">50m2</span>
									<span class="blog_post_comments">80000vnđ</span>
								</div>
								<div class="blog_post_text">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, 
										quam tincidunt venen. Cras pharetra vel ex ut imperdiet. Lorem ipsum dolor sit amet, 
										consectetur adipiscing elit. Maecenas consectetur neque non felis placerat, 
										nec luctus nunc ullamcorper.
									</p>
								</div>
								<a href="client/blog_detail" class="blog_post_link">chi tiết
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											width="13px" height="7px" viewBox="0 0 13 7" enable-background="new 0 0 13 7" xml:space="preserve">
									<polygon id="arrow_poly_1" class="arrow_poly" fill="#FF4200" points="13,3.5 9,0 9,3 0,3 0,4 9,4 9,7 "/>
									</svg>
								</a>
							</article>
						

					</div>
	
						
				</div> --}}

				
				<!-- Sidebar -->
				

			</div>
		</div>
	</div>

@endsection

{{--  <!-- Mostel Post -->
						<article class="blog_post">
								<div class="blog_post_image">
									<div class="blog_post_image_background" style="background-image:url(client_asset/images/blog_1.jpg)"></div>
								</div>
								<h3 class="blog_post_title"><a href="client/blog_detail">nhà trọ sơn-hảo</a></h3>
								<div class="blog_post_meta">
									<span class="blog_post_author">Gác lững</span>
									<span class="blog_post_category">50m2</span>
									<span class="blog_post_comments">80000vnđ</span>
								</div>
								<div class="blog_post_text">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, 
										quam tincidunt venen. Cras pharetra vel ex ut imperdiet. Lorem ipsum dolor sit amet, 
										consectetur adipiscing elit. Maecenas consectetur neque non felis placerat, 
										nec luctus nunc ullamcorper.
									</p>
								</div>
								<a href="client/blog_detail" class="blog_post_link">chi tiết
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											width="13px" height="7px" viewBox="0 0 13 7" enable-background="new 0 0 13 7" xml:space="preserve">
									<polygon id="arrow_poly_1" class="arrow_poly" fill="#FF4200" points="13,3.5 9,0 9,3 0,3 0,4 9,4 9,7 "/>
									</svg>
								</a>
						</article>
							
						<!-- Mostel Post -->

						<article class="blog_post">
								<div class="blog_post_image">
									<div class="blog_post_image_background" style="background-image:url(client_asset/images/blog_1.jpg)"></div>
								</div>
								<h3 class="blog_post_title"><a href="client/blog_detail">nhà trọ sơn-hảo</a></h3>
								<div class="blog_post_meta">
									<span class="blog_post_author">Gác lững</span>
									<span class="blog_post_category">50m2</span>
									<span class="blog_post_comments">80000vnđ</span>
								</div>
								<div class="blog_post_text">
									<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vestibulum, 
										quam tincidunt venen. Cras pharetra vel ex ut imperdiet. Lorem ipsum dolor sit amet, 
										consectetur adipiscing elit. Maecenas consectetur neque non felis placerat, 
										nec luctus nunc ullamcorper.
									</p>
								</div>
								<a href="client/blog_detail" class="blog_post_link">chi tiết
									<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
											width="13px" height="7px" viewBox="0 0 13 7" enable-background="new 0 0 13 7" xml:space="preserve">
									<polygon id="arrow_poly_1" class="arrow_poly" fill="#FF4200" points="13,3.5 9,0 9,3 0,3 0,4 9,4 9,7 "/>
									</svg>
								</a>
						</article>  --}}