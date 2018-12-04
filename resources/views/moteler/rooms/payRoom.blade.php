@extends('moteler.layout.index')

@section('content')
<div class="card mb-3">
<div class="card-header">
    <i class="fa fa-table"></i> Đổi phòng {{ $room->name }}
</div>
<div class="card-body">

    <div class="card-body">
        @if(session('mess'))
            <div class="alert alert-success alert-dismissible">
                {{ session('mess') }}
            </div>
        @endif
            <div class="table-responsive">
                <form class="contact100-form validate-form" action="moteler/rooms/payRoom/{{ $room->id }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th colspan="2">Điện</th>
                            <th colspan="2">Nước</th>
                            <th colspan="2">Dịch vụ</th>
                            <th>Nợ</th>
                            <th colspan="3"></th>

                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td style="text-align: left">
                                <div>Cũ</div>
                                <div>Mới</div>
                            </td>
                            <td>
                                <div><input type="text" id="no_elec_old" name="no_elec_old" readonly="true" value=""></div>
                                <div><input type="text" id="no_elec_new" name="no_elec_new" value=""></div>
                            </td>
                            <td style="text-align: left">
                                <div>Cũ</div>
                                <div>Mới</div>
                            </td>
                            <td>
                                <div><input type="text" id="no_water_old" name="no_water_old" readonly="true" value=""></div>
                                <div><input type="text" id="no_water_new" name="no_water_new" value=""></div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" readonly="true"
                                           value="">
                                </div>
                            </td>

                            <td>
                                <div>
                                    <input type="text" id="price" name="price" readonly="true" value="">
                                </div>
                            </td>
                            <td></td>
                            <td class="act">
                                <button class="contact100-form-btn">
                                            <span>
                                                Thanh toán/ trả phòng
                                                <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                                            </span>
                                </button>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>

    </div>

</div>
</div>
<script>

</script>
<style >
    tbody tr td:nth-child(2) div input, td:nth-child(4) div input, td:nth-child(6) div input, td:nth-child(7){
        text-align: center;
        width: 10%;
    }
    tbody td:nth-child(9), tbody td:nth-child(10) {
        text-align: left;
    }
    tbody td:nth-child(8){
        color: red;
        text-align: center;
    }



</style>

@endsection
