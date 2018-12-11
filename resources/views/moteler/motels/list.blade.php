@extends('moteler.layout.index')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Nhà trọ</div>
    <div class="card-body">
        @if(count($mtls) != 0)
            <div class="act_add" style="float:right;" >
                <button class="btn btn-info" type="button">
                    <a href="moteler/motels/add" style="color:white">
                        <i class="fa fa-edit"> <b>Thêm Nhà Trọ</b></i>
                    </a>
                </button>
            </div>
        @endif
        <div class="table-responsive">
            @if(count($mtls) == 0)
            <form class="contact100-form validate-form" id="nodata" action="moteler/motels/add" method="POST">
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
                            <option value="0" selected="selected">Còn trống</option>
                            <option value="1">Hêt Phòng</option>
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

            @else
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên Nhà Trọ</th>
                    <th>Địa Chỉ</th>
                    <th>Trạng Thái</th>
                    <th colspan="2"></th>
                </tr>
                </thead>
                <tbody>
                <?php $index=1 ?>
                @foreach ($mtls as $mtls)
                    <tr>
                        <td>{{ $index++ }}</td>
                        <td>{{ $mtls->name }}</td>
                        <td>{{ $mtls->address }}</td>
                        <td>{{ ($mtls->status) ? 'Hết Phòng' : 'Còn Phòng' }}</td>
                        <td class="act">
                            <button class="btn btn-primary" type="button">
                                <a href="moteler/motels/edit/{{ $mtls->id }}">
                                    <i class="fa fa-edit"> Sửa</i>
                                </a>
                            </button>
                        </td>
                        <td class="act">
                            <button class="btn btn-danger" type="button">
                                <a href="moteler/motels/del/{{ $mtls->id }}">
                                    <i class="fa fa-remove"> Xóa</i>
                                </a>
                            </button>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
    {{--  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>  --}}
</div>
<script>
    window.onload = function () {

        var con = {!! $mtls !!}
            if(con.length == 0){
            document.getElementById("nodata")[0].setAttribute("class", "democlass");
            document.getElementById("dataTable")[0].setAttribute("class", "democlass");
            console.log(con.length)

        }

    }

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

</script>
@endsection