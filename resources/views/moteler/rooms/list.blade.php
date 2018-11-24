@extends('moteler.layout.index')
    
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Loại Phòng</div>
    <div class="card-body"> 

         <div class="act_add" style="float:right;" >
            <button class="btn btn-info" type="button">
                <a href="moteler/rooms/add">
                    <i class="fa fa-edit"> Thêm phòng trọ</i>
                </a>
            </button>
        </div>

        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>STT</th>
                <th>Phòng</th>
                <th>Loại phòng</th>
                <th>Trạng thái</th>
                <th>Mô tả</th>
                <th colspan="2"></th>
            </tr>
            </thead>
            <tbody>
            <?php $index=1 ?>
            @foreach($rooms as $room)  
                <tr>
                    <td>{{ $index++ }}</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->catalogue_room->name }} </td>
                    <td>{{ ($room->status == 1) ? "Đã Thuê" : "Trống" }}</td>
                    <td>
                        @if($room->status == 0)
                        <button class="btn btn-info" type="button">
                            <a href="moteler/rooms/rent/{{ $room->id }}">
                                <i class="fa fa-edit"> Thuê Phòng</i>
                            </a>
                        </button>
                        @elseif($room->status == 1)
                        <button class="btn btn-info" type="button">
                            <a href="moteler/rooms/change/{{ $room->id }}">
                                <i class="fa fa-edit"> Đổi phòng</i>
                            </a>
                        </button>

                        <button class="btn btn-info" type="button">
                            <a href="moteler/rooms/payRoom/{{ $room->id }}">
                                <i class="fa fa-edit"> Trả phòng</i>
                            </a>
                        </button>
                        @endif
                    </td>
                    <td class="act">
                        <button class="btn btn-primary" type="button">
                            <a href="moteler/rooms/edit/{{ $room->id }}">
                                <i class="fa fa-edit"> Cập nhật</i>
                            </a>
                        </button>
                    </td>
                    <td class="act">
                        <button class="btn btn-danger" type="button">
                            <a href="moteler/rooms/del/{{ $room->id }}">
                                <i class="fa fa-remove"> Xóa</i>
                            </a>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>

        {{-- <div class="act_add">
            <button class="btn btn-info" type="button">
                <a href="moteler/catalogue_room/add">
                    <i class="fa fa-edit"> Thêm loại phòng</i>
                </a>
            </button>
        </div> --}}

    </div>
    {{--  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>  --}}
</div>

@endsection