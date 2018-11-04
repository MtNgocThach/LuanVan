<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\rooms;
use App\services;


class salesCtrl extends Controller
{
    //
    public function getList(){
        $rooms = rooms::where('id_mler', 1)->get();
//        $services = services::where(['id_mler', 1], ['id_mls',1])->get();
        $services = services::where('id_mler', 1)->where('id_mls',1)->get();

        return view('moteler.sales.list',['rooms'=>$rooms, 'sers'=>$services]);
    }

    public function createSales(){

        return redirect('moteler/sales/list')->with('mess','Lưu Hoá Đơn Thành công');
    }
}
