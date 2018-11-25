@extends('moteler.layout.index')
    
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Loại Phòng</div>
    <div class="card-body">

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
                <th>Chủ trọ</th>
                <th>Nhà trọ</th>
                {{-- <th>Giá</th>
                <th>Mô tả</th> --}}
                <th colspan="2"></th>
            </tr>
            </thead>
            <tbody>
            <?php $index=1 ?>
            @foreach($mtls as $mtl)

                <tr>
                    <td>{{ $index ++ }}</td>
                    <td>{{ $mtl->name }}</td>
                    <td></td>
                    <td class="act">
                        <button class="btn btn-primary" type="button">
                            <a href="admin/account/editMotel/{{ $mtl->id }}">
                                <i class="fa fa-edit" style="color: white;"> Sửa</i>
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