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

			<form class="contact100-form validate-form" style="" action="moteler/catalogue_room/edit/{{ $ctl->id }}" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<span class="contact100-form-title">
					Sửa Loại Phòng: {{ $ctl->name }}
				</span>

				<div class="wrap-input100 validate-input bg1" data-validate="Vui lòng điền tên loại phòng">
					<span class="label-input100">Loại Phòng *</span>
					<input class="input100" type="text" value="{{ $ctl->name }}" name="name" placeholder="Loại phòng">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Vui lòng điền số người ở...">
					<span class="label-input100">Số người *</span>
					<input class="input100" type="number" value="{{ $ctl->numpers }}" name="numpers" placeholder="Số người ">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate = "Vui lòng điền giá loại phòng">
					<span class="label-input100">Giá *</span>
					<input class="input100" type="number" value="{{ $ctl->price }}" name="price" placeholder="Giá phòng">
				</div>		

				<div class="wrap-input100  bg0 rs1-alert-validate">
					<span class="label-input100">Mô tả</span>
					{{--  <textarea class="input100"  name="des" placeholder="Mô tả..."></textarea>  --}}
					<input class="input100" type="text" name="des" value="{{ $ctl->description }}">
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Lưu chỉnh sửa
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