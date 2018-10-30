@extends('moteler.layout.index')
    
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Loại Phòng</div>
    <div class="card-body"> 

        <div class="act_add" style="float:right">
            <button class="btn btn-info" type="button">
                <a href="moteler/catalogue_room/add" style="color:white">
                    <i class="fa fa-edit"> <b>Thêm loại phòng</b></i>
                </a>
            </button>
        </div>

        @if(session('mess'))
            <div class="alert alert-success alert-dismissible">
                {{ session('mess') }}
            </div>
        @endif

        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>STT</th>
                <th>Loại phòng</th>
                <th>Số người</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th colspan="2"></th>
            </tr>
            </thead>
            <!-- <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>action</th>
            </tr>
            </tfoot> -->
            <tbody>
            <?php $index=1 ?>
            @foreach($ctls as $ctl)  
                <tr>
                    <td>{{ $index++ }}</td>
                    <td>{{ $ctl->name }}</td>
                    <td> {{ $ctl->numpers }} </td>
                    <td>{{ $ctl->price }}</td>
                    <td>{{ $ctl->description }}</td>
                    <td class="act">
                        <button class="btn btn-primary" type="button">
                            <a href="moteler/catalogue_room/edit/{{ $ctl->id }}">
                                <i class="fa fa-edit"> Sửa</i>
                            </a>
                        </button>
                    </td>
                    <td class="act">
                        <button class="btn btn-danger" type="button">
                            <a href="moteler/catalogue_room/del/{{ $ctl->id }}">
                                <i class="fa fa-remove"> Xóa</i>
                            </a>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>  
        {{-- <div class="act_add" style="float:right">
            <button class="btn btn-info" type="button">
                <a href="moteler/catalogue_room/add">
                    <i class="fa fa-edit"> Thêm loại phòng</i>
                </a>
            </button>
        </div>      --}}

    </div>
    
    {{--  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>  --}}
</div>

@endsection