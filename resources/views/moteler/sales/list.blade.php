@extends('moteler.layout.index')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Thanh Toán</div>
    <div class="card-body">

    <div class="card-body">
        @if(session('mess'))
            <div class="alert alert-success alert-dismissible">
                {{ session('mess') }}
            </div>
        @endif
        <div class="table-responsive">
            <form class="contact100-form validate-form" action="moteler/sales/create" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Phòng</th>
                            <th colspan="2">Điện</th>
                            <th colspan="2">Nước</th>
                            <th colspan="2">Dịch vụ</th>
                            <th>Nợ</th>
                            <th colspan="3"></th>

                        </tr>
                    </thead>
                    <tbody>

                    {{--one row is bill of one room--}}
                    @foreach($mls as $motel)
                        @foreach($rooms as $room)
                            @if($motel->id == $room->id_mls)
                                <tr>
                                    <td id="room_name">
                                        <div>{{$motel->name}} - {{ $room->name }}</div>
                                        @foreach( $renters as $renter)
                                            @if($room->id == $renter->id_room)
                                                <div>{{ $renter->last_name }}</div>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td style="text-align: left">
                                        <div>Cũ</div>
                                        <div>Mới</div>
                                    </td>
                                    <td>
                                        <div><input type="text" id="no_elec_old" name="no_elec_old{{ $room->id }}" readonly="true" value="{{ $room->no_elec }}"></div>
                                        <div><input type="text" id="no_elec_new" name="no_elec_new{{ $room->id }}" value=""></div>
                                    </td>
                                    <td style="text-align: left">
                                        <div>Cũ</div>
                                        <div>Mới</div>
                                    </td>
                                    <td>
                                        <div><input type="text" id="no_water_old" name="no_water_old{{ $room->id }}" readonly="true" value="{{ $room->no_water }}"></div>
                                        <div><input type="text" id="no_water_new" name="no_water_new{{ $room->id }}" value=""></div>
                                    </td>
                                    <td>
                                        @foreach($sers as $ser)
                                            @if($ser->id_mls == $room->id_mls)
                                                <div>
                                                    <input type="text" readonly="true"
                                                           value="@if(!in_array($ser->name, array('Điện', 'Nước'))) {{ $ser->name }}@endif">
                                                </div>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($sers as $ser)
                                            @if($ser->id_mls == $room->id_mls)
                                                <div>
                                                    <input type="text" id="price_{{$ser->name}}" name="price_{{ $ser->name }}{{ $room->id }}" readonly="true"
                                                           value="@if(!in_array($ser->name, array('Điện', 'Nước'))) {{$ser->price}} @endif">
                                                </div>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>{{ $room->debt }}</td>
                                    <td class="act">
                                        <button class="contact100-form-btn">
                                            <i class="fa fa-upload"> Lưu</i>
                                        </button>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>

</div>
<script>

</script>
<style >
    tbody tr td:nth-child(3) div input, td:nth-child(5) div input, td:nth-child(7) div input, td:nth-child(10) div input{
        text-align: center;
        width: 100%;
        color: red;
    }
    tbody td:nth-child(9), tbody td:nth-child(10) {
        text-align: left;
        width: 10%
    }
    tbody td:nth-child(8){
        color: red;
        text-align: center;
    }
    tbody tr td:nth-child(1){
        width: 200px;
        text-align: left;
        font-weight: bold;
    }
    tbody td:nth-child(6) div input{
        text-align: left;
        width: 100%;
    }
    button{
        text-align: center; color: White;
    }

</style>
@endsection
