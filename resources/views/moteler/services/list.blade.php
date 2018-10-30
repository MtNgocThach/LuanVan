@extends('moteler.layout.index')

@section('content')
<div class="card mb-3">

    @if(session('mess'))
    <div class="alert alert-success alert-dismissible">
        {{ session('mess') }}
    </div>
    @endif

    <div class="card-header">
        <i class="fa fa-table"></i> Dịch vụ</div>
    <div class="card-body">
        <div class="act_add" style="float:right">
            <button class="btn btn-info" type="button">
                <a href="moteler/services/add" style="color:white">
                    <i class="fa fa-edit"> <b>Thêm Dich Vụ</b></i>
                </a>
            </button>
        </div>
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>STT</th>
                <th>Dịch vụ</th>
                <th>Giá</th>
                <th>Mô tả</th>
                <th colspan="2"></th>
            </tr>
            </thead>
            <tbody>
            <?php $index =1 ?>
            @foreach ($sers as $ser)
            <tr>
                <td>{{ $index++ }}</td>
                <td>{{ $ser->name }}</td>
                <td>{{ $ser->price }}</td>
                <td>{{ $ser->description }}</td>
                <td class="act">
                    <button class="btn btn-primary" type="button">
                        <a href="moteler/services/edit/{{ $ser->id }}">
                            <i class="fa fa-edit"> Sửa</i>
                        </a>
                    </button>
                </td>
                <td class="act">
                    <button class="btn btn-danger" type="button">
                        <a href="moteler/services/del/{{ $ser->id }}">
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