<!DOCTYPE html>
<html lang="en">
<head>

<title>Motel</title>
<base href=" {{ asset('') }} ">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Zeta Template Project">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="client_asset/styles/bootstrap4/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="client_asset/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css">
<link rel="stylesheet" type="text/css" href="client_asset/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="client_asset/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="client_asset/plugins/OwlCarousel2-2.2.1/animate.css">

<link rel="stylesheet" type="text/css" href="client_asset/plugins/js-flickr-gallery-1.24/js-flickr-gallery.css">
<link rel="stylesheet" type="text/css" href="client_asset/plugins/colorbox/colorbox.css">

<link rel="stylesheet" type="text/css" href="client_asset/styles/main_styles.css">
<link rel="stylesheet" type="text/css" href="client_asset/styles/responsive.css">

{{--  blog  --}}
<link rel="stylesheet" type="text/css" href="client_asset/styles/blog_styles.css">
<link rel="stylesheet" type="text/css" href="client_asset/styles/blog_responsive.css">
{{--  end blog  --}}

{{--  blog_detail  --}}
<link rel="stylesheet" type="text/css" href="client_asset/styles/blog_post_styles.css">
<link rel="stylesheet" type="text/css" href="client_asset/styles/blog_post_responsive.css">
<link rel="stylesheet" type="text/css" href="client_asset/styles/contact_styles.css">
{{--  end blog_detail  --}}

{{--  contact  --}}
<link rel="stylesheet" type="text/css" href="client_asset/styles/contact_styles.css">
<link rel="stylesheet" type="text/css" href="client_asset/styles/contact_responsive.css">
{{--  end contact  --}}

</head>

<body>

<div class="super_container">
	
	<!-- Header & menu-->

	@include('client.layout.header')

	

	@yield('content_client')



	<!-- Footer -->

	

</div>

<script src="client_asset/js/jquery-3.2.1.min.js"></script>
<script src="client_asset/styles/bootstrap4/popper.js"></script>
<script src="client_asset/styles/bootstrap4/bootstrap.min.js"></script>
<script src="client_asset/plugins/greensock/TweenMax.min.js"></script>
<script src="client_asset/plugins/greensock/TimelineMax.min.js"></script>
<script src="client_asset/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="client_asset/plugins/greensock/animation.gsap.min.js"></script>
<script src="client_asset/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="client_asset/plugins/progressbar/progressbar.min.js"></script>
<script src="client_asset/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="client_asset/plugins/easing/easing.js"></script>
<script src="client_asset/js/custom.js"></script>
{{--  - key map  --}}
{{--  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>  --}}
</body>

</html>