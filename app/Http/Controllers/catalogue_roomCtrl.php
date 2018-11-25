<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\catalogue_room;
use App\motels;
use App\catalogue;
// use Illuminate\Support\Facades\Request;

class catalogue_roomCtrl extends Controller
{
    //Danh Sách
    public function getList(){
        $ctls = catalogue_room::where('id_mler', (Auth::user())->id_mler)->get();
        return view('moteler.catalogue_room.list',['ctls'=>$ctls]);
    }

     //Xóa
    public function getDel($id){
        $ctl = catalogue_room::find($id);
        $ctl->delete();

        return redirect('moteler/catalogue_room/list')->with('mess','Bạn Đã Xóa Thành Công');
    }

    //Sửa
    public function getEdit($id){
        $ctl = catalogue_room::find($id);
        return view('moteler.catalogue_room.edit',['ctl'=>$ctl]);
    }
    public function postEdit(Request $res, $id){
        $ctl = catalogue_room::find($id);

        $ctl->name = $res->name;
        $ctl->numpers = $res->numpers;
        $ctl->price = $res->price;
        if(!empty($res->des)){
            $ctl->description = $res->des;
        }

        $ctl->save();


        return redirect('moteler/catalogue_room/edit/'.$id)->with('mess','Sửa Loại Phòng Thành công');
    }

    //Thêm
    public function getAdd(){

        $mtls = motels::where('id_mler',(Auth::user())->id_mler)->get();
        $ctls = catalogue::all();
        
        return view('moteler/catalogue_room/add',['mtls'=>$mtls,'ctls'=>$ctls]);
    }
    public function postAdd(Request $res){
        // echo $res->des;
        $nameCtl = catalogue::where('id',$res->id_ctl)->value('name');
        $ctl = new catalogue_room;

        $ctl->name = $nameCtl;
        $ctl->numpers = $res->numpers;
        $ctl->price = $res->price;
        $ctl->description = $res->des;
        $ctl->area = $res->area;

        $ctl->id_ctlg = $res->id_ctl;
        $ctl->id_mls = $res->id_mtl;
        $ctl->id_mler = (Auth::user())->id_mler;
        // echo $ctl->description;

        $ctl->save();

        return redirect('moteler/catalogue_room/add')->with('mess','Thêm Loại Phòng Thành công');
    }

   
}
