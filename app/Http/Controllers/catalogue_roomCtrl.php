<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\catalogue_room;
// use Illuminate\Support\Facades\Request;

class catalogue_roomCtrl extends Controller
{
    //Danh Sách
    public function getList(){
        $ctls = catalogue_room::all();
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
        
        return view('moteler/catalogue_room/add');
    }
    public function postAdd(Request $res){
        // echo $res->des;
        
        $ctl = new catalogue_room;
        $ctl->name = $res->name;
        $ctl->numpers = $res->numpers;
        $ctl->price = $res->price;
        $ctl->description = $res->des;

        $ctl->id_mls = 2;
        // echo $ctl->description;

        $ctl->save();

        return redirect('moteler/catalogue_room/add')->with('mess','Thêm Loại Phòng Thành công');
    }

   
}
