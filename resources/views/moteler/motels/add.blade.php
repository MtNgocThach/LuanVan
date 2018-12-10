@extends('moteler.layout.index')

@section('content')
<div class="row">
	<div class="container-contact100">
		<div class="wrap-contact100">

			@if(session('mess'))
			<div class="alert alert-success">
				{{ session('mess') }}
			</div>
			@endif

			<form class="contact100-form validate-form" action="moteler/motels/add" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<span class="contact100-form-title">
					Thêm Nhà Trọ
				</span>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Vui lòng điền tên nhà trọ">
					<span class="label-input100">Nhà Trọ *</span>
					<input class="input100" type="text" name="name" placeholder="Nhà trọ">
				</div>
				<div class="wrap-input100 bg1 rs1-wrap-input100" data-validate = "Vui lòng điền giá loại phòng">
					<span class="label-input100">Trạng Thái</span>
					<select name="status" id="" class="input100" class="validate-input" style="border-radius:5px; width:90%">
						<option value="1" selected="selected">Còn trống</option>
						<option value="0">Hêt Phòng</option>
					</select>
					{{-- <input class="input100" type="number" name="latitude" placeholder="Giá phòng"> --}}
				</div>

				<div class="wrap-input100 validate-input bg1" data-validate="Vui lòng điền địa chỉ">
					<span class="label-input100">Địa chỉ *</span>
					<input class="input100" type="text" id="address" name="address" placeholder="Địa chỉ" onchange="getLongAndLat()">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100" data-validate = "Vui lòng điền kinh độ...">
					<span class="label-input100">Kinh độ</span>
					<input class="input100" readonly type="" id="longitude" name="longitude" onchange="checkNo()" placeholder="Kinh độ ">
				</div>

				<div class="wrap-input100 bg1 rs1-wrap-input100" data-validate = "Vui lòng điền vĩ độ...">
					<span class="label-input100">Vĩ độ</span>
					<input class="input100" readonly type="" id="latitude" name="latitude" onchange="checkNo()" placeholder="Vĩ độ ">
				</div>

				{{-- <div class="wrap-input100 bg1 rs1-wrap-input100" data-validate = "Vui lòng điền giá loại phòng">
					<span class="label-input100">Trạng Thái</span>
					<input class="input100" type="number" name="latitude" placeholder="Giá phòng">
				</div> --}}

				<div class="wrap-input100 bg1 " >
					<span class="label-input100">Mô tả</span>
					<input class="input100" type="text" name="des" placeholder="Mô tả...">
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Thêm nhà trọ mới
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
					</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="moteler_asset/form/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="moteler_asset/form/vendor/animsition/js/animsition.min.js"></script>
<script src="moteler_asset/form/vendor/bootstrap/js/popper.js"></script>
<script src="moteler_asset/form/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="moteler_asset/form/vendor/select2/select2.min.js"></script>
<script src="moteler_asset/form/js/main.js"></script>

<script>

	function getLongAndLat(){

		var address = document.getElementById('address').value;
		$.ajax({
			url: "https://maps.googleapis.com/maps/api/geocode/json",
			data: {
				'key': 'AIzaSyAr3h47KsMPXAQHpDQ1YtLtT0Q0Z_WQ9IA',
				'address': address,
				'sensor': 'false',
				'fbclid': 'IwAR2692wZ6RY4uflXENB2qROCL9hxD1YnokR75M_MJzBT9MuQ-pxE8RBWcOQ',
			},
			cache: false,
			type: "GET",
			success: function(response) {
				var dataApi = response.results;
				dataApi.forEach(function (item) {
				    console.log(item)
					document.getElementById('longitude').value = item['geometry']['location']['lat'];
					document.getElementById('latitude').value = item['geometry']['location']['lng'];
				})
			},
			error: function(xhr) {
				alert('False');
			}
		});
	}

	$(".js-select2").each(function(){
		$(this).select2({
			minimumResultsForSearch: 20,
			dropdownParent: $(this).next('.dropDownSelect2')
		});

		$(".js-select2").each(function(){
			$(this).on('select2:close', function (e){
				if($(this).val() == "Please chooses") {
					$('.js-show-service').slideUp();
				}
				else {
					$('.js-show-service').slideUp();
					$('.js-show-service').slideDown();
				}
			});
		});
	});

	function checkNo() {
		var fields = ['longitude', 'latitude'];
		fields.forEach(function (item) {
			var con = document.getElementById(item).value;
			if (con != '' || con == '') {
				if (!con.indexOf('-')){
					var thisAlert = $("#"+item).parent();
					$(thisAlert).addClass('alert-validate');
					$(thisAlert).append('<span class="btn-hide-validate">&#xf136;</span>');
				}
			}
		})
	}

    var filterBar = document.getElementById('filter-bar');

    noUiSlider.create(filterBar, {
        start: [ 1500, 3900 ],
        connect: true,
        range: {
            'min': 1500,
            'max': 7500
        }
    });

    var skipValues = [
        document.getElementById('value-lower'),
        document.getElementById('value-upper')
    ];

    filterBar.noUiSlider.on('update', function( values, handle ) {
        skipValues[handle].innerHTML = Math.round(values[handle]);
        $('.contact100-form-range-value input[name="from-value"]').val($('#value-lower').html());
        $('.contact100-form-range-value input[name="to-value"]').val($('#value-upper').html());
    });

    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-23581568-13');
</script>
<!--===============================================================================================-->
<script src="moteler_asset/form/vendor/daterangepicker/moment.min.js"></script>
<script src="moteler_asset/form/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="moteler_asset/form/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="moteler_asset/form/vendor/noui/nouislider.min.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>

@endsection