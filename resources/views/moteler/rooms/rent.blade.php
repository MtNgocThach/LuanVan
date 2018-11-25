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

            <form class="contact100-form validate-form" style="" action="moteler/rooms/rent/{{ $room->id }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <span class="contact100-form-title">
                    Phòng: {{ $room->name }} <br>
                    Giá: {{ $price }}
				</span>

                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Vui lòng điền họ">
                    <span class="label-input100">Họ *</span>
                    <input class="input100" type="text" name="last_name" placeholder="Họ...">
                </div>

                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Vui lòng điền tên">
                    <span class="label-input100">Tên *</span>
                    <input class="input100" type="text" name="first_name" placeholder="Tên...">
                </div>

                {{--<div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Vui lòng điền tên">--}}
                    {{--<span class="label-input100">Tên người thuê *</span>--}}
                    {{--<input class="input100" type="text" name="	first_name" placeholder="Tên...">--}}
                {{--</div>--}}

                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Vui lòng điền số người ở">
                    <span class="label-input100">Số người *</span>
                    <input class="input100" type="text" name="no_per" placeholder="Số người...">
                </div>


                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Vui lòng điền số người ở">
                    <span class="label-input100">Tiền cọc *</span>
                    <input class="input100" type="text" name="deposit" placeholder="Tiền cọc"...>
                </div>

                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Vui lòng điền số điện thoại">
                    <span class="label-input100">Số điện thoại *</span>
                    <input class="input100" type="text" name="phone" placeholder="Số điện thoại..">
                </div>

                <div class="wrap-input100 validate-input bg1 rs1-wrap-input100" data-validate="Vui lòng điền số điện thoại">
                    <span class="label-input100">Thư điện tử(email) *</span>
                    <input class="input100" type="text" name="email" placeholder="Email...">
                </div>

                <div class="container-contact100-form-btn">
                    <button class="contact100-form-btn">
						<span>
							Thuê phòng
							<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
						</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection