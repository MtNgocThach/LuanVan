@extends('moteler.layout.index')

@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Nhà trọ</div>
    <div class="card-body">
        <div class="act_add" style="float:right;" >
            <button class="btn btn-info" type="button">
                <a href="moteler/motels/add" style="color:white">
                    <i class="fa fa-edit"> <b>Thêm Nhà Trọ</b></i>
                </a>
            </button>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên Nhà Trọ</th>
                <th>Địa Chỉ</th>
                {{-- <th>Kinh Độ</th>
                <th>Vĩ Độ</th> --}}
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
                {{-- <td>{{ $mtls->longitude }}</td>
                <td>{{ $mtls->latitude }}</td> --}}
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
        </div>
    </div>
    {{--  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>  --}}
</div>

@endsection