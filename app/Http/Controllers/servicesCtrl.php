<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\services;
use App\motels;


class servicesCtrl extends Controller
{
    //Danh Sách
    public function getList(){
        $mtls = motels::where('id_mler',(Auth::user())->id_mler)->get();
        $sers = services::where('id_mler',(Auth::user())->id_mler)->get();

        return view('moteler.services.list',['sers'=>$sers,'mtls'=>$mtls]);
    }

    //Xóa
    public function getDel($id){
        $sers = services::find($id);
        $sers->delete();

        return redirect('moteler/services/list')->with('mess','Bạn Đã Xóa Thành Công');
    }

    //Thêm
    public function getAdd(){
        // $sers = services::where('id_mls',1)->get(); //đk chủ trọ
        $mtls = motels::where('id_mler',(Auth::user())->id_mler)->get();

        return view('moteler/services/add',['mtls'=>$mtls]);
    }
    public function postAdd(Request $res){
        
        $rooms = new services;
        $rooms->name = $res->name;
        $rooms->price = $res->price;
        $rooms->description = $res->des;

        $rooms->id_mls = $res->mtl_id;
        $rooms->id_mler = (Auth::user())->id_mler;

        $rooms->save();

        return redirect('moteler/services/add')->with('mess','Thêm Dịch Vụ Thành công');
    }

    //Sửa
    public function getEdit($id){
        $ser  = services::find($id);
        $mtls = motels::where('id_mler', (Auth::user())->id_mler)->get();
        return view('moteler.services.edit',['ser'=>$ser, 'mtls'=>$mtls]);
    }
    public function postEdit(Request $res, $id){
        $sers = services::find($id);
        
        $sers->name = $res->name;
        $sers->price = $res->price;
        $sers->description = $res->des;

        $sers->save();


        return redirect('moteler/services/edit/'.$id)->with('mess','Sửa Dịch Vụ Thành công');
    }
}
