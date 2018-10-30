<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\rooms;
use App\catalogue_room;

class roomsCtrl extends Controller
{
    //Danh Sách
    public function getList(){
        $rooms = rooms::all();

        return view('moteler.rooms.list',['rooms'=>$rooms]);
    }

    //Xóa
    public function getDel($id){
        $rooms = rooms::find($id);
        $rooms->delete();

        return redirect('moteler/catalogue_room/list')->with('mess','Bạn Đã Xóa Thành Công');
    }

    //Sửa 
    public function getEdit($id){
        $ctls = catalogue_room::where('id_mls',1)->get(); //đk chủ trọ
        $rooms = rooms::find($id);
        return view('moteler.rooms.edit',['rooms'=>$rooms,'ctls'=>$ctls]);
    }
    public function postEdit(Request $res, $id){
        $rooms = rooms::find($id);

        $rooms->name = $res->name;
        $rooms->area = $res->area;
        $rooms->status = $res->status;
        $rooms->description = $res->des;

        $rooms->save();


        return redirect('moteler/rooms/edit/'.$id)->with('mess','Sửa Thông Tin Phòng Thành Công');
    }

    //Thêm
    public function getAdd(){
        $ctls = catalogue_room::where('id_mls',1)->get(); //đk chủ trọ
        
        return view('moteler/rooms/add',['ctls'=>$ctls]);
    }
    public function postAdd(Request $res){
        // echo $res->des;
        
        $rooms = new rooms;
        $rooms->name = $res->name;
        $rooms->area = $res->area;
        $rooms->status = $res->status;
        $rooms->description = $res->des;
        $rooms->id_ctl = $res->id_ctl;
        // echo $rooms->description;

        $rooms->save();

        return redirect('moteler/rooms/add')->with('mess','Thêm Loại Phòng Thành công');
    }
}
