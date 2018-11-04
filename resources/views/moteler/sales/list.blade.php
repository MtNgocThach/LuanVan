@extends('moteler.layout.index')

@section('content')
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Thanh Toán
        </div>

        <div class="card-body">
            @if(session('mess'))
                <div class="alert alert-success alert-dismissible">
                    {{ session('mess') }}
                </div>
            @endif
            <?php
                var_dump($rooms);
            ?>
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
                        @foreach($rooms as $room)
                            <tr>
                                <td id="room_name">{{ $room->name }}</td>
                                <td style="text-align: left">
                                    <div>Cũ</div>
                                    <div>Mới</div>
                                </td>
                                <td>
                                    <div><input type="text" id="no_elec_old" readonly="true" value="{{ $room->no_elec }}"></div>
                                    <div><input type="text" id="no_elec_new" value="352"></div>
                                </td>
                                <td style="text-align: left">
                                    <div>Cũ</div>
                                    <div>Mới</div>
                                </td>
                                <td>
                                    <div><input type="text" id="no_water_old" readonly="true" value="{{ $room->no_water }}"></div>
                                    <div><input type="text" id="no_water_new" value="352"></div>
                                </td>
                                <td>
                                    @foreach($sers as $ser)
                                        <div>
                                            <input type="text" readonly="true" value="@if(in_array($ser->name, array('Điện', 'Nước'))) {{$ser->name}} @endif">
                                        </div>
                                    @endforeach
                                </td>

                                <td>
                                    @foreach($sers as $ser)
                                        <div>
                                            <input type="text" id="price_{{$ser->name}}" readonly="true" value="@if(in_array($ser->name, array('Điện', 'Nước'))) {{$ser->price}} @endif">
                                        </div>
                                    @endforeach
                                </td>
                                <td>...</td>Điện
                                <td>
                                    <div>Thanh toán</div>
                                </td>
                                <td>
                                    <div><input type="text" id="pay" placeholder="Sô tiền trả"></div>
                                    <div><input type="text" id="debt" value="" hidden="hidden"></div>
                                </td>
                                <td class="act">
                                    <button class="btn btn-info">
                                        <i class="fa fa-save" style="text-align: center; color: White;" aria-hidden="true"> <b>Lưu</b></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </form>
            </div>
            <i class="fa fa-table"></i> Thanh Toán</div>

    </div>
@endsection
<style >
    tbody tr td:nth-child(3) div input, td:nth-child(5) div input, td:nth-child(6) div input, td:nth-child(7) div input, td:nth-child(10) div input{
        text-align: center;
        width: 100%;
    }
    tbody td:nth-child(9) {
        text-align: left;
        width: 10%
    }
    tbody td:nth-child(8){
        color: red;
        text-align: left;
    }
    tbody tr td:nth-child(1){
        text-align: left;
        margin: auto auto;
        font-weight: bold;
    }

</style>
@endsection
