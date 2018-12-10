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


			<form class="contact100-form validate-form" action="admin/account/add" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<span class="contact100-form-title">
					Thêm Tài Khoản Mới<br>
					Xin Chào <i>{{ (Auth::user())->name }}</i>
					<input type="text" hidden="hidden" readonly="readonly" value="" name="id_mler">
				</span>

				<div class="wrap-input100 validate-input rs1-wrap-input100 bg1" data-validate="Vui lòng điền Họ..." >
					<span class="label-input100">Họ </span>
					<input class="input100" type="text" name="frist_name" placeholder="Vui lòng điền Họ của bạn...">
				</div>
				<div class="wrap-input100  validate-input rs1-wrap-input100 bg1" data-validate="Vui lòng điền Tên...">
					<span class="label-input100">Tên </span>
					<input class="input100"type="text" name="last_name" placeholder="Vui lòng điền Tên của bạn...">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Vui lòng điền số điện thoại">
					<span class="label-input100">Điện thoại</span>
					<input class="input100" type="text" name="phone" placeholder="Điện thoại">
				</div>

				<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Vui lòng điền đúng email">
					<span class="label-input100">Hộp thư</span>
					<input class="input100" type="text" name="email" placeholder="Hộp thư">
				</div>
					
				<div class="wrap-input100 bg1">
					<span class="label-input100">Địa chỉ</span>
					<input class="input100" type="text" name="address" placeholder="Địa chỉ ">
				</div>						

				<div class="wrap-input100  bg0 rs1-alert-validate" id="divUser" data-validate="Vui lòng điền tài khoản" onchange="checkAcc()">
					<span class="label-input100">Tài Khoản</span>
					<input class="input100" type="text" name="user" id="user" placeholder="Vui lòng nhập tài khoản...">
				</div>
				<div class="wrap-input100  bg0 rs1-alert-validate" data-validate="Vui lòng điền mật khẩu">
					<span class="label-input100">Mật khẩu</span>
					<input class="input100" type="password" name="pass" id="pass" placeholder="Vui lòng nhập mật khẩu...">
				</div>
				<div class="wrap-input100   bg0 rs1-alert-validate" id="divPassCon" data-validate="Vui lòng nhập lại mật khẩu">
					<span class="label-input100">Nhập lại mật khẩu</span>
					<input class="input100" type="password" name="confirm_pass" id="confirm_pass" placeholder="Vui lòng nhập lại mật khẩu..." onchange="checkconfirm()">
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						<span>
							Thêm tài khoản mới
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

		function checkAcc() {
		    var datas = {!! $accs !!};
		    var con = document.getElementById('user').value;
		    datas.forEach(function (item) {
				if (item['username'] == con) {
                    var thisAlert = $("#user").parent();
                    document.getElementById("divUser").setAttribute("data-validate", "Vui lòng chọn tên tài khoản khác");
                    $(thisAlert).addClass('alert-validate');
                    $(thisAlert).append('<span class="btn-hide-validate">&#xf136;</span>');
				}
            })
			console.log(datas);
        }

        function checkconfirm() {
			var pass 			= document.getElementById('pass').value;
			var pass_confirm 	= document.getElementById('confirm_pass').value;

			if (pass != pass_confirm){
                var thisAlert = $("#confirm_pass").parent();
                document.getElementById("divPassCon").setAttribute("data-validate", "Vui lòng nhập lại đúng mật khẩu");
                $(thisAlert).addClass('alert-validate');
                $(thisAlert).append('<span class="btn-hide-validate">&#xf136;</span>');
			}
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
	<script src="moteler_asset/form/js/main.js"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');

  {{-- My script --}}

</script>

@endsection