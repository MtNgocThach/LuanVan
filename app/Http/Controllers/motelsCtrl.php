<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\motels;
use App\moteler;
use App\account;

class motelsCtrl extends Controller
{
    // public $prior = (Auth::user());
    //Danh Sách
    public function getList(){
        $mtls = motels::where('id_mler',(Auth::user())->id_mler)->get();
        return view('moteler.motels.list',['mtls'=>$mtls]);
    }

    //Thêm
    public function getAdd(){
        
        return view('moteler/motels/add');
    }
    public function postAdd(Request $res){        
        $mtl = new motels();

        $mtl->name = $res->name;
        $mtl->address = $res->address;
        $mtl->longitude = $res->longitude;
        $mtl->latitude = $res->latitude;
        $mtl->status = $res->status;
        $mtl->description = $res->des;

        $mtl->id_mler = (Auth::user())->id_mler;
        // echo $ctl->description;

        $mtl->save();

        return redirect('moteler/motels/add')->with('mess','Thêm Nhà Trọ Thành công');
    }
    //Sửa
    public function getEdit($id){
        $mtl = motels::find($id);
        return view('moteler.motels.edit',['mtl'=>$mtl]);
    }
    public function postEdit(Request $res, $id){
        $mtl = motels::find($id);

        $mtl->name = $res->name;
        $mtl->address = $res->address;
        $mtl->longitude = $res->longitude;
        $mtl->latitude = $res->latitude;
        $mtl->status = $res->status;
        $mtl->description = $res->des;
        $mtl->id_mler = (Auth::user())->id_mler;

        $file = $res->image;
        $mtl->image = $file->getClientOriginalName();
        $location = 'moteler_asset/form/images';
        $file->move($location, $mtl->image);

        $mtl->save();

        return redirect('moteler/motels/edit/'.$id)->with('mess','Sửa Nhà Trọ Thành công');
    }

     //Xóa
     public function getDel($id){
        $mtl = motels::find($id);
        $mtl->delete();

        return redirect('moteler/motels/list')->with('mess','Bạn Đã Xóa Thành Công');
    }
}
