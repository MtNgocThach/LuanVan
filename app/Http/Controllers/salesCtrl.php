<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

use App\rooms;
use App\services;
use App\motels;
use App\catalogue_room;
use App\renter;
use App\sales;
use App\moteler;

class salesCtrl extends Controller
{
    //
    public function getList(){
        $rooms = rooms::where('id_mler', (Auth::user())->id_mler)->where('status', '1')->get();
        $services = services::where('id_mler', (Auth::user())->id_mler)->get();
        $motels = motels::where('id_mler', (Auth::user())->id_mler)->get();
        $renters = renter::where('id_mler',(Auth::user())->id_mler)->get();

        $sales = sales::where('id_mler', (Auth::user())->id_mler)->get();

        return view('moteler.sales.list',['rooms'=>$rooms, 'sers'=>$services,
                                                'mls'=>$motels,'renters'=>$renters, 'sales'=>$sales]);

    }

    public function createSales(Request $res){

        $rooms = rooms::where('id_mler', (Auth::user())->id_mler)->get();
        $services = services::where('id_mler', (Auth::user())->id_mler)->get();
        $motels = motels::where('id_mler', (Auth::user())->id_mler)->get();

        // set data sales for ever room
        foreach ($rooms as $room){
            $i = $room->id;
            if ($res->input('no_elec_new'.$i) == '' && $res->input('no_water_new'.$i) == ''){
                continue;
            } else{
                $sale = new sales();

                $room->no_water = $res->input('no_water_new'.$i);
                $room->no_elec = $res->input('no_elec_new'.$i);
                $room->status = 2;

                $sale->no_elec_old  = $res->input('no_elec_old'.$i);
                $sale->no_elec_new  = $res->input('no_elec_new'.$i);
                $sale->no_water_old = $res->input('no_water_old'.$i);
                $sale->no_water_new = $res->input('no_water_new'.$i);

                foreach ($services as $service) {
                    if ($service->id_mls == $room->id_mls && $service->name == 'Điện'){
                        $sale->price_elec = $service->price;
                    }
                    if ($service->id_mls == $room->id && $service->name == 'Nước'){
                        $sale->price_water = $service->price;
                    }   
                }

                $sale->services_cost = 0;
                $price = catalogue_room::where('id_mls', $room->id_mls)->where('id_mler', (Auth::user())->id_mler)
                                        ->where('id', $room->id_ctl)->value('price');
                $change = date_format(new DateTime($room->date_change), 'm');
                $m_now = date('m');
                if ($change == $m_now){
                    $d_change = date_format(new DateTime($room->date_change), 'd');
                    $d_now = date('d');

                    $sale->room_cost = ($d_now - $d_change)*$price;
                }else{
                    $sale->room_cost = $price;
                }
                $sale->id_mler = Auth::user()->id_mler;
                $sale->id_mls = $room->id_mls;
                $sale->id_room = $i;
                $sale->status = 1;
                $sale->date = date('Y/m/d');

                $debt_old   = $res->input('debt'.$i);
                $no_elec    = $sale->no_elec_new - $sale->no_elec_old;
                $no_water   = $sale->no_elec_new - $sale->no_elec_old;
                $cost_elec  = $no_elec * $sale->price_elec;
                $cost_water = $no_water * $sale->price_water;

                if ($room->deposit < $room->pay_deposit){
                    $sale->sum = $sale->room_cost + $cost_elec  + $cost_water + $debt_old - $room->deposit ;
                    $room->deposit = 0;
                }else if ($room->deposit >= $room->pay_deposit){
                    $sale->sum = $sale->room_cost + $cost_elec  + $cost_water + $debt_old - $room->pay_deposit;
                    $room->deposit = $room->deposit - $room->pay_deposit;
                }
                $room->debt = 0;

                $sale->save();
                $room->save();

                $moteler = moteler::find(Auth::user()->id_mler);
                $renter = renter::where('id_room', $room->id)->get()->first();

                $dataMail = [
                    'nFrom'         => 'Website hệ thống quản lý nhà trọ',
                    'email_from'    => $moteler->email,
                    'email_to'      => $renter->email,
                    'nTo'           => $renter->last_name.' '.$renter->first_name,
                    'title'         => 'Tiền trọ tháng '. date('m'),
                    'content'       => 'Website Hệ thống quản lý nhà trọ xin thông báo để người thuê trọ:  '.
                                        $renter->last_name.' '.$renter->first_name.' Tiền trọ tháng '.date('m').
                                        'Tổng cộng là: '.$sale->sum.' Chi tiết: Tiêu thụ '.$no_elec.' ký điện với giá định mức là '.$cost_elec.
                                        'Và tiêu thụ '.$no_water.' ký nước với giá '.$cost_water.'/ khối'. 'Tiền gồm tiền phòng '.$sale->room_cost.
                                        ', và tiền điện, nước. Tổng tiền đã trừ bớt 1 phần tiền cọc hàng tháng. Vui lòng thanh toán tiền trọ đúng hạn.'

                ];

                $this->sendMail($dataMail);
            }
        }

        return redirect('moteler/sales/list')->with('mess','Lưu Hoá Đơn Thành công');
    }

    public function getListBills(){
        $rooms = rooms::where('id_mler', (Auth::user())->id_mler)->where('status', '2')->get();
        $services = services::where('id_mler', (Auth::user())->id_mler)->get();
        $motels = motels::where('id_mler', (Auth::user())->id_mler)->get();
        $renters = renter::where('id_mler',(Auth::user())->id_mler)->get();

        $sales = sales::where('id_mler', (Auth::user())->id_mler)->where('status','<>' ,'0')->get();

        return view('moteler.sales.listBills',['rooms'=>$rooms, 'sers'=>$services, 'mls'=>$motels,'renters'=>$renters, 'sales'=>$sales]);
    }

    public function postupdateBill(Request $res){

        $sale = sales::find($res->id);
        $room = rooms::find($sale->id_room);

        $sale->sum = $sale->sum - $res->pay;
        $sale->date_pay = date('Y/m/d');

        if ($res->pay == $sale->sum){
            $room->debt = 0;
            $room->status = 1;
            $sale->status = 1;
            $sale->save();
            $room->save();
            return redirect('moteler/sales/list')->with('mess','Đã thanh toán hoá đơn');
        }else{
            $room->debt = $sale->sum - $res->pay;
            $sale->status = 2;
            $room->status = 1;
            $sale->save();
            $room->save();
            return redirect('moteler/sales/list')->with('mess','Đã thanh toán một phần hoá đơn');
        }
    }

    public function postPayDebt(Request $res){

        $sale = sales::find($res->id_payDebt);
        if ($sale == NULL){
            return redirect('moteler/sales/list')->with('mess','Lỗi lưu hoá đơn');
        }else{
            $room = rooms::find($sale->id_room);

            $sale->sum = $sale->sum - $res->pay;
            $sale->date_pay = date('Y/m/d');

            if ($res->pay == $sale->sum){
                $room->debt = 0;
                $room->status = 1;
                $sale->status = 1;
                $sale->save();
                $room->save();
                return redirect('moteler/sales/listBills')->with('mess','Đã thanh toán hoá đơn');
            }else{
                $room->debt = $sale->sum - $res->pay;
                $sale->status = 0;
                $room->status = 1;
                $sale->save();
                $room->save();
                return redirect('moteler/sales/listBills')->with('mess','Đã thanh toán một phần hoá đơn');
            }
        }


        var_dump($res->id_payDebt);die;
    }

}
