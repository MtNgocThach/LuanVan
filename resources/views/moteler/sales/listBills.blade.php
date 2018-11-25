@extends('moteler.layout.index')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fa fa-table"></i> Danh Sách Hoá Đơn</div>

    <div class="card-body">
        @if(session('mess'))
            <div class="alert alert-success alert-dismissible">
                {{ session('mess') }}
            </div>
        @endif
        <div class="table-responsive">
            <form class="contact100-form validate-form">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Phòng</th>
                            <th>Người Thuê</th>
                            <th>Ngày</th>
                            <th>Tổng tiền</th>
                            <th colspan="2"></th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>T101</td>
                            <td>Nguyễn Văn A</td>
                            <td>11/12/2018</td>
                            <td>1000000</td>
                            <td>
                                <button class="contact100-form-btn" type="button" data-toggle="modal" data-target="#detaiBilllModal">
                                    <i class="fa fa-upload"> Chi Tiết</i>
                                </button>
                            </td>
                            <td>
                                <button class="contact100-form-btn" type="button" data-toggle="modal" data-target="#payModal"  >
                                        <i class="fa fa-upload"> Thanh Toán</i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>

{{--<!-- Modal -->--}}
<div class="modal fade" id="detaiBilllModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi Tiết</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="payModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thanh toán</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="contact100-form validate-form" style="" action="moteler/sales/updateBill" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="wrap-input100 validate-input bg1" data-validate="Vui lòng nhập số tiền...">
                        <span class="label-input100">Số tiền thanh toán</span>
                        <input class="input100" type="text" value="" name="name" placeholder="Số tiền...">
                    </div>
                    <div class="container-contact100-form-btn">
                        <button class="contact100-form-btn">
                    <span>
                        Thanh Toán
                        <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
                    </span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>

<script type="text/javascript">

    // $('#pay').change(function(e){
    //
    //     var pay = document.getElementById('pay').value;
    //     // alert(pay);
    //     e.preventDefault();
    //     // alert($('#test').val());
    //     var a = $('#test').val();
    //     // alert(a);
    //     element.setAttribute("style", "background-color: red;");
    //     document.getElementById("#b")[0].setAttribute("href", "'moteler/sales/updateBill' + pay");
    // });

</script>
<style >

</style>
@endsection
