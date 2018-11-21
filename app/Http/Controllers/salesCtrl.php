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
        $rooms = rooms::where('id_mler', (Auth::user())->id_mler)->where('status', '0')->get();
        $services = services::where('id_mler', (Auth::user())->id_mler)->get();
        $motels = motels::where('id_mler', (Auth::user())->id_mler)->get();
        $renters = renter::where('id_mler',(Auth::user())->id_mler)->get();
//        var_dump($rooms);die;
//        $test = array_merge($rooms, $services);
        return view('moteler.sales.list',['rooms'=>$rooms, 'sers'=>$services, 'mls'=>$motels,'renters'=>$renters]);
//        return view('moteler.sales.list',['rooms'=>$rooms, 'sers'=>$services, 'mls'=>$motels, 'test'=>$test]);
    }

    public function getListBills(){
        $rooms = rooms::where('id_mler', (Auth::user())->id_mler)->where('status', '0')->get();
        $services = services::where('id_mler', (Auth::user())->id_mler)->get();
        $motels = motels::where('id_mler', (Auth::user())->id_mler)->get();
        $renters = renter::where('id_mler',(Auth::user())->id_mler)->get();
//        var_dump($rooms);die;
//        $test = array_merge($rooms, $services);
        return view('moteler.sales.listBills',['rooms'=>$rooms, 'sers'=>$services, 'mls'=>$motels,'renters'=>$renters]);
//        return view('moteler.sales.list',['rooms'=>$rooms, 'sers'=>$services, 'mls'=>$motels, 'test'=>$test]);
    }

    public function updateBill(Request $res){


        var_dump($res->name);die;

    }

    public function createSales(Request $res){

        $rooms = rooms::where('id_mler', (Auth::user())->id_mler)->get();
        $services = services::where('id_mler', (Auth::user())->id_mler)->get();
        $motels = motels::where('id_mler', (Auth::user())->id_mler)->get();

        // set data sales for ever room
        foreach ($rooms as $room){
            $sale = new sales();
            $i = $room->id;
            if ($res->input('no_elec_new'.$i) == '' && $res->input('no_water_new'.$i) == ''){
                continue;
            } else{
                $sale->no_elec_old = $res->input('no_elec_old'.$i);
                $sale->no_elec_new = $res->input('no_elec_new'.$i);
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
                $sale->id_mls = $i;
                $sale->status = 1;
                $sale->date = getdate();

                $debt_old = $res->input('debt'.$i);
                $pay = $res->input('pay'.$i);

                $cost_elec = ($sale->no_elec_new - $sale->no_elec_old) * $sale->price_elec;
                $cost_water = ($sale->no_water_new - $sale->no_water_old) * $sale->price_water;

                $sale->sum = $sale->room_cost + $cost_elec  + $cost_water - $debt_old ;

//                if($pay != 0 && $pay < $sale->sum){
//                    $sale->debt = $sale->sum - $pay;
//                }else{
//                    $sale->debt = 0;
//                }


//                $sale->save();
            }

        }
        $a = date("d/m/Y");
        $b = new DateTime();
        $month = date('m', $b);
        var_dump($month); die;
        return redirect('moteler/sales/list')->with('mess','Lưu Hoá Đơn Thành công');
//        $ctls = catalogue_room::all();
        return view('moteler.sales.list',['rooms'=>$rooms, 'sers'=>$services, 'mls'=>$motels,'a'=>$res->no_elec_old]);
    }
}
