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

class salesCtrl extends Controller
{
    //
    public function getList(){
        $rooms = rooms::where('id_mler', (Auth::user())->id_mler)->where('status', '1')->get();
        $services = services::where('id_mler', (Auth::user())->id_mler)->get();
        $motels = motels::where('id_mler', (Auth::user())->id_mler)->get();
        $renters = renter::where('id_mler',(Auth::user())->id_mler)->get();

        $sales = sales::where('id_mler', (Auth::user())->id_mler)->get();
//        foreach ($sales as $sale){
//            $d = date_format(new DateTime($sale->date), 'm');
////
////            $a = date('m');
//            var_dump($d);
//        }
//        die;

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
                    if ($service->id_mls == $room->id && $service->name == 'Điện'){
                        $sale->price_elect = $service->price;
                    }
                    if ($service->id_mls == $room->id && $service->name == 'Nước'){
                        $sale->price_water = $service->price;
                    }
                }

                $sale->services_cost = 0;
                $price = catalogue_room::where('id_mls', $room->id_mls)
                                        ->where('id', $room->id_ctl)->value('price');
                $sale->room_cost = $price;
                $sale->id_mler = Auth::user()->id_mler;
                $sale->id_mls = $room->id_mls;
                $sale->id_room = $i;
                $sale->status = 1;
                $sale->date = date('Y/d/m');

                $debt_old = $res->input('debt'.$i);
                $cost_elec = ($sale->no_elec_new - $sale->no_elec_old) * $sale->price_elec;
                $cost_water = ($sale->no_water_new - $sale->no_water_old) * $sale->price_water;

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
            }

        }

        return redirect('moteler/sales/list')->with('mess','Lưu Hoá Đơn Thành công');
//        $ctls = catalogue_room::all();
        return view('moteler.sales.list',['rooms'=>$rooms, 'sers'=>$services, 'mls'=>$motels,'a'=>$res->no_elec_old]);
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
        $sale->date_pay = date('Y/d/m');

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

}
