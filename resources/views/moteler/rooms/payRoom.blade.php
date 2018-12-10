@extends('moteler.layout.index')

@section('content')
<div class="card mb-3">
<div class="card-header">
    <i class="fa fa-table"></i> Trả phòng {{ $room->name }}
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
                                <div><input type="text" id="no_elec_old" name="no_elec_old" readonly="true" value="{{ $room->no_elec }}"></div>
                                <div><input type="text" id="no_elec_new" name="no_elec_new" value=""></div>
                            </td>
                            <td style="text-align: left">
                                <div>Cũ</div>
                                <div>Mới</div>
                            </td>
                            <td>
                                <div><input type="text" id="no_water_old" name="no_water_old" readonly="true" value="{{ $room->no_water }}"></div>
                                <div><input type="text" id="no_water_new" name="no_water_new" value=""></div>
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
                                            <input type="text" id="price_{{$ser->id}}" name="price_{{ $ser->id }}" readonly="true"
                                                   value="@if(!in_array($ser->name, array('Điện', 'Nước'))) {{$ser->price}} @endif">
                                        </div>
                                    @endif
                                @endforeach
                            </td>
                            <td></td>
                            <td class="act">
                                <button class="contact100-form-btn">
                                            <span>
                                                Trả phòng
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
<style>
    tbody tr td:nth-child(1), tr td:nth-child(3){
        width: 100px;
        text-align: left;
        font-weight: bold;
    }
    tbody tr td:nth-child(5) input{
        width: 100px;
        text-align: left;
        font-weight: bold;
    }
    tbody tr td:nth-child(2) input, tr td:nth-child(4) input, tr td:nth-child(6) input{
        width: 80px;
        text-align: center;
    }



</style>

@endsection
