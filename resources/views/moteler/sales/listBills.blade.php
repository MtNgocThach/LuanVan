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
                    @foreach($sales as $sale)
                        <?php
                            $m_sale = date_format(new DateTime($sale->date), 'm');
                            $m_now = date('m');

                            if ($m_sale == $m_now){
                        ?>
                        <tr id="{{ $sale->id }}">
                            <td>
                                @foreach($rooms as $room)
                                    @if($room->id == $sale->id_room)
                                        {{ $room->name }}
                                    @endif
                                @endforeach

                            </td>
                            <td>
                                @foreach($renters as $renter)
                                    @if($renter->id_room == $sale->id_room)
                                        {{ $renter->last_name }} {{ $renter->first_name  }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ date_format(new DateTime($sale->date), 'd/m/Y') }}</td>
                            <td>{{ $sale->sum }}</td>
                            <?php if ($sale->status == 2){ ?>
                                <td>
                                    <button class="contact100-form-btn" type="button" data-toggle="modal" onclick="payDebt({{ $sale->id }})" data-target="#payDebtModal">
                                        <i class="fa fa-upload"> Thanh toán nợ</i>
                                    </button>
                                </td>
                            <?php }elseif ($sale->status == 1){ ?>
                                <td>
                                    <button class="contact100-form-btn" type="button" data-toggle="modal" onclick="detail({{ $sale->id_room }})" data-target="#detaiBilllModal">
                                        <i class="fa fa-upload"> Chi Tiết</i>
                                    </button>
                                </td>
                                <td>
                                    <button class="contact100-form-btn" type="button" data-toggle="modal" onclick="pay({{ $sale->id }})" data-target="#payModal"  >
                                            <i class="fa fa-upload"> Thanh Toán</i>
                                    </button>
                                </td>
                            <?php } ?>
                        </tr>
                        <?php } ?>
                    @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
{{--<!-- Modal -->--}}
<div class="modal fade" id="detaiBilllModal" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi Tiết</h5>
                <p id="customer"></p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered" id="detailSale" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Tiền phòng</th>
                        <td id="price_room" colspan="2"></td>
                    </tr>
                    <tr>
                        <th rowspan="3">Điện</th>
                        <td id="no_elec_old"></td>
                        <td id="no_elec_new"></td>
                    </tr>
                    <tr>
                        <td>Số ký</td>
                        <td id="no_elec"></td>
                    </tr>
                    <tr>
                        <td>Đơn giá</td>
                        <td id="price_elec"></td>
                    </tr>
                    <tr>
                        <th rowspan="3">Nước</th>
                        <td id="no_water_old"></td>
                        <td id="no_water_new"></td>
                    </tr>
                    <tr>
                        <td>Số ký</td>
                        <td id="no_water"></td>
                    </tr>
                    <tr>
                        <td>Đơn giá</td>
                        <td id="price_water"></td>
                    </tr>
                    <tr>
                        <th>Nợ cũ</th>
                        <td id="debt" colspan="2"></td>
                    </tr>
                    <tr>
                        <th>Tiền cọc còn lại</th>
                        <td id="deposit" colspan="2"></td>
                    </tr>
                    <tr>
                        <th>Tổng hoá đơn</th>
                        <td id="sum" colspan="2"></td>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
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
                        <input class="input100" type="text" name="pay" placeholder="Số tiền...">
                        <input class="input100" type="text" id="id" name="id" hidden>
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

<div class="modal fade" id="payDebtModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thanh toán</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="contact100-form validate-form" style="" action="moteler/sales/payDebt" method="POST">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="wrap-input100 validate-input bg1" data-validate="Vui lòng nhập số tiền...">
                        <span class="label-input100">Số tiền thanh toán</span>
                        <input class="input100" type="number" name="pay" placeholder="Số tiền..." onchange="checkNo()">
                        <input class="" type="number" id="id_payDebt" name="id_payDebt" placeholder="id_room" hidden>
                    </div>
                    <div class="container-contact100-form-btn">
                        <button class="contact100-form-btn">
                    <span>
                        Thanh Toán Nợ
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

    function pay($id) {
        document.getElementById("id").setAttribute("value", $id);
    }

    function payDebt($id) {
        document.getElementById("id_payDebt").setAttribute("value", $id);
    }

    function checkNo() {
        var fields = ['longitude', 'latitude'];
        fields.forEach(function (item) {
            var con = document.getElementById(item).value;
            if (con != '' || con == '') {
                if (!con.indexOf('-')){
                    var thisAlert = $("#"+item).parent();
                    $(thisAlert).addClass('alert-validate');
                    $(thisAlert).append('<span class="btn-hide-validate">&#xf136;</span>');
                }
            }
        })
    }

    function detail($id) {
        var data_sales = {!! $sales !!};
        var data_rooms = {!! $rooms !!};
        var customers  = {!! $renters !!};
        data_sales.forEach(function (element) {
            var name_room = '';
            var deposit = 0;
            var customer = '';
            if (element['id_room'] == $id) {
                data_rooms.forEach(function (item) {
                    if (element['id_room'] == item['id']) {
                        name_room = item['name'];
                        deposit = item['deposit']
                    }
                });
                customers.forEach(function (element) {
                    if (element['id_room'] == $id) {
                        customer = element['last_name'] + ' ' + element['first_name'];
                    }
                });
                //fill
                $("#exampleModalLabel").text('Chi tiết hoá đơn phòng ' + name_room);
                $("#customer").text('Khách thuê: ' + customer);
                $("#price_room").text(element['room_cost']);
                $("#no_elec_old").text('Cũ: ' + element['no_elec_old']);
                $("#no_elec_new").text('Mới: ' + element['no_elec_new']);
                $("#no_elec").text(element['no_elec_new'] - element['no_elec_old']);
                $("#price_elec").text(element['price_elec']);
                $("#no_water_old").text('Cũ: ' + element['no_water_old']);
                $("#no_water_new").text('Mới: ' + element['no_water_new']);
                $("#no_water").text(element['no_water_new'] - element['no_water_old']);
                $("#price_water").text(element['price_water']);
                $("#debt").text(element['debt']);
                $("#deposit").text(deposit);
                $("#sum").text(element['sum']);

                // document.getElementById("exampleModalLabel").setAttribute("", 's');
            }
        });
    }

</script>
<style >
    #detaiBilllModal table th {
        text-align: left;
    }
    #sum {
        text-align: right;
        color: red;
        font-weight: bold;
        font-size: larger;
        font-style: italic;
    }
    #sum, #deposit, #debt, #price_room{
        text-align: right;
    }
    #exampleModalLabel{
        width: 60%;
    }
</style>
@endsection
