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

			<form class="contact100-form validate-form" style="" action="moteler/rooms/add" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<span class="contact100-form-title">
					Thêm Phòng Trọ <br>
				</span>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Vui lòng điền tên phòng">
					<span class="label-input100">Tên phòng trọ *</span>
					<input class="input100" type="text" name="name" placeholder="Tên phòng">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Vui lòng chọn nhà trọ">
					<span class="label-input100">Nhà trọ - Loại phòng *</span>
					<select name="id_ctl" id="" class="input100" style="border-radius:5px; width:90%">
						<option value="">---Chọn nhà trọ---</option>
						@foreach($ctls as $ctl)
							<option value="{{ $ctl->id }}">
								<?php foreach ($mtls as $mtl)
									if ($mtl->id == $ctl->id_mls){
									    echo $mtl->name;
									}
								?>
								 - {{ $ctl->name }}
							</option>
						@endforeach
					</select>
				</div>

				<div class="wrap-input100 bg0 rs1-alert-validate ">
					<span class="label-input100">Mô tả</span>
					<input class="input100" type="text" name="des" >
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Thêm phòng trọ mới
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
	<script>
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
		})
	</script>
<!--===============================================================================================-->
	<script src="moteler_asset/form/vendor/daterangepicker/moment.min.js"></script>
	<script src="moteler_asset/form/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="moteler_asset/form/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="moteler_asset/form/vendor/noui/nouislider.min.js"></script>
	<script>
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
	</script>
	<script src="moteler_asset/form/js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');

</script>

@endsection