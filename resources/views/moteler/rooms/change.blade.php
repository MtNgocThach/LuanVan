@extends('moteler.layout.index')

@section('content')
<div class="card mb-3">
<div class="card-header">
    <i class="fa fa-table"></i> Đổi Phòng {{ $room->name }}
</div>
<div class="card-body">

    <div class="card-body">
        @if(session('mess'))
            <div class="alert alert-success alert-dismissible">
                {{ session('mess') }}
            </div>
        @endif
            <div class="table-responsive">
                <form class="contact100-form validate-form" action="moteler/rooms/change/{{ $room->id }}" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th></th>
                            <th colspan="2"></th>
                            <th colspan="2">Điện</th>
                            <th colspan="2">Nước</th>
                            <th>Nợ</th>
                            <th colspan="3"></th>

                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td></td>
                            <td>
                                <div>Ngày ở</div>
                                <div>Ngày trả</div>
                                <div>Tiền phòng</div>
                            </td>

                            <td>

                                <div><?php echo date('d/m/Y') ?></div>
                                <div>
                                    <?php
                                    $d_now = date('d') - 01;
                                    echo $d_now;
                                    ?>
                                </div>
                                <div>
                                    <input type="text" readonly="true" name="cost_date" value="<?php echo $price * ($d_now/30);?>" >
                                </div>
                            </td>
                            <td style="text-align: left">
                                <div>Cũ</div>
                                <div>Mới</div>
                            </td>
                            <td>
                                <div><input type="text" id="no_elec_old" name="no_elec_old" readonly="true" value="{{ $room->no_elec }}"></div>
                                <div><input type="text" id="no_elec_new" name="no_elec_new"></div>
                            </td>
                            <td style="text-align: left">
                                <div>Cũ</div>
                                <div>Mới</div>
                            </td>
                            <td>
                                <div><input type="text" id="no_water_old" name="no_water_old" readonly="true" value="{{ $room->	no_water }}"></div>
                                <div><input type="text" id="no_water_new" name="no_water_new"></div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" readonly="true" name="debt" value="{{ $room->debt }}">
                                </div>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Đổi phòng</td>
                            <td colspan="2">
                                <select id="id_room_change" name="id_room_change" class="input100" class="validate-input" onchange="set()" style="border-radius:5px; width:90%">
                                    <option value=""></option>
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->id }}">{{ $room->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td colspan="2">
                                <div><input type="text" readonly="true" id="no_elec" name="no_elce" value=""></div>
                            </td>
                            <td colspan="2">
                                <div><input type="text" readonly="true" id="no_water" name="no_water" value=""></div>
                            </td>
                            <td></td>
                            <td class="act">
                                <button class="contact100-form-btn">
                                    <span>
                                        Đổi phòng
                                        <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                                    </span>
                                </button>
                            </td>

                            {{--<td>--}}
                                {{--<input type="text" readonly="true" id="cost_room" name="cost_room" value="">--}}
                                {{--<input type="text" readonly="true" id="id_ctl" name="id_ctl" value="">--}}
                            {{--</td>--}}
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>

    </div><style >


    </style>

</div>
</div>
<script>
    function set() {
        var id = document.getElementById("id_room_change").value;
        var data_room = {!! $rooms !!};
        var data_price = {!! $price_rooms !!};
        var con_ctl = '';

        data_room.forEach(function (element) {
            if (element['id'] == id) {
                con_ctl = element['id_ctl'];

                document.getElementById("no_elec").setAttribute("value", element['no_elec']);
                document.getElementById("no_water").setAttribute("value", element['no_water']);
            }
        })

        data_price.forEach(function (element) {
            if (element['id'] == con_ctl){

                document.getElementById("cost_room").setAttribute("value", element['price']);
                document.getElementById("id_ctl").setAttribute("value", element['id']);
            }
        });
    }
</script>
<style >
    tbody tr:nth-child(1) td:nth-child(5) div input, tr:nth-child(1) td:nth-child(7) div input{
        text-align: center;
        width: 100%;
    }
    tbody tr:nth-child(1) td:nth-child(2) div{
        text-align: left;
    }
    tbody tr:nth-child(1) td:nth-child(8) div input{
        text-align: center ;
        width: 100%;
    }
    tbody tr:nth-child(1) td:nth-child(9){
        width: 20%;
    }
    tbody tr:nth-child(1) td:nth-child(2) div {
        width: 100px;
    }
    tbody tr:nth-child(1) td:nth-child(3) div {
        text-align: right;
        width: 100px;
    }
    tbody tr:nth-child(1) td:nth-child(3) div input{
        color: red;
        font-weight: bold;
        text-align: right;
        width: 100%;
    }
    tbody tr:nth-child(2) td:nth-child(3) div input, tr:nth-child(2) td:nth-child(4) div input{
        text-align: center;
        width: 100%;
    }

</style>

@endsection
