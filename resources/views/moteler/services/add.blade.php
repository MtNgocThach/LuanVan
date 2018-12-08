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

			<form class="contact100-form validate-form" action="moteler/services/add" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<span class="contact100-form-title">
					Thêm Dịch Vụ
				</span>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Vui lòng điền tên loại dịch vụ">
					<span class="label-input100">Tên Dịch Vụ *</span>
					<select name="name" id="name" class="input100" class="validate-input" onchange="set()" style="border-radius:5px; width:90%">
							<option value="Điện">Điện</option>
							<option value="Nước">Nước</option>
							<option value="1">khác</option>
					</select>
					<input class="input100" type="text" placeholder="Tên dịch vụ" hidden>


				</div>
				<div class="wrap-input100 bg1 rs1-wrap-input100 rs1-wrap-input100" data-validate = "Vui lòng chọn tên phòng trọ">
					<span class="label-input100">Phòng trọ</span>
					<select name="mtl_id" id="" class="input100" class="validate-input" style="border-radius:5px; width:90%">
						@foreach( $mtls as $mtl)
							<option value="{{ $mtl->id }}">
								{{ $mtl->name }}
							</option>
						@endforeach
					</select>
				</div>

				<div class="wrap-input100 bg1 " data-validate = "Vui lòng điền giá dịch vụ">
					<span class="label-input100">Giá *</span>
					<input class="input100" type="number" id="price" name="price" placeholder="Giá " onchange="checkNo()">
				</div>
				

				<div class="wrap-input100  bg0 rs1-alert-validate">
					<span class="label-input100">Mô tả</span>
					<textarea class="input100" name="des" placeholder="Mô tả..."></textarea>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Thêm dịch vụ mới
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

    function set() {

        if (document.getElementById('name').value == 1) {
            document.getElementsByTagName("INPUT")[1].setAttribute("name", "name");
            document.getElementsByTagName("INPUT")[1].removeAttribute("hidden");
            document.getElementsByTagName("select")[0].setAttribute("hidden", "");
            document.getElementsByTagName("select")[0].removeAttribute("name");
        }
    }

    function checkNo() {
        var fields = ['price'];
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
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

@endsection