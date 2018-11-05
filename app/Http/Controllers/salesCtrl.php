<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\rooms;
use App\services;
use App\motels;
class salesCtrl extends Controller
{
    //
    public function getList(){
        $rooms = rooms::where('id_mler', (Auth::user())->id_mler)->get();
        $services = services::where('id_mler', (Auth::user())->id_mler)->get();
        $motels = motels::where('id_mler', (Auth::user())->id_mler)->get();

        return view('moteler.sales.list',['rooms'=>$rooms, 'sers'=>$services, 'mls'=>$motels]);
    }

    public function createSales(){

        return redirect('moteler/sales/list')->with('mess','Lưu Hoá Đơn Thành công');
//        $ctls = catalogue_room::all();
        return view('moteler.sales.list');
    }
}
