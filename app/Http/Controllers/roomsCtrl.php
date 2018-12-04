<?php

namespace App\Http\Controllers;
use App\sales;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\rooms;
use App\motels;
use App\renter;
use App\services;
use App\catalogue;
use App\catalogue_room;


class roomsCtrl extends Controller
{
    public function getListRent($id){
        $room = rooms::find($id);

        $price = catalogue_room::where('id_mler', (Auth::user())->id_mler)
                        ->where('id_mls', $room->id_mls)
                        ->where('id', $room->id_ctl)->value('price');

        return view('moteler.rooms.rent',['room'=>$room, 'price'=>$price]);

    }

    public function postRent(Request $res, $id){
        $room = rooms::find($id);
        $renter = new renter;

        $room->status = 1;
        $room->deposit = $res->deposit;
        $room->no_per = $res->no_per;


        $renter->first_name = $res->first_name;
        $renter->last_name = $res->last_name;
        $renter->phone = $res->phone;
        $renter->email = $res->email;
        $renter->id_room = $id;
        $renter->id_mler = (Auth::user())->id_mler;


        $room->save();
        $renter->save();


        return redirect('moteler/rooms/rent/'.$id)->with('mess','Phòng'.$room->name.'đã được thuê');
    }

    //Pay Room
    public function getPayRoom($id){
        $room = rooms::find($id);
        $renter = renter::where('id_room', $id)->get();

        return view('moteler.rooms.payRoom',['room'=>$room]);
    }

    public function postPayRoom(Request $res, $id){
        $save= new sales;
        $room = rooms::find($id);
        $renter = renter::where('id_room', $id)->get();
        $room_cost = catalogue_room::where('id', $room->id_ctl)->value('price');
        $price_elec = services::where('id_mls', $room->id_mls)
                            ->where('id_mler', (Auth::user())->id_mler)
                            ->where('name', 'Điện')->value('price');
        $price_water = services::where('id_mls', $room->id_mls)
                            ->where('id_mler', (Auth::user())->id_mler)
                            ->where('name', 'Nước')->value('price');

        $room->status = 1;
        $room->debt = 0;

        $renter->id_room = 0;
        $renter->date_end = date("d/m/Y");
        $renter->note = $id;

        $save->id_room = $id;
        $save->id_mler = (Auth::user())->id_mler;
        $save->id_mls = $room->id_mls;
        $save->room_cost = $room_cost;
        $save->no_elec_old = $room->no_elec;
        $save->no_elec_new = $res->no_elec_new;
        $save->no_water_old = $room->no_water;
        $save->no_water_new= $res->no_water_new;
        $save->price_elec = $price_elec;
        $save->price_water = $price_water;
        $save->debt = '';
        $save->sum = '';
        $save->status = 4;
        $save->date = date("d/m/Y");
//        $renter->date_pay = date("d/m/Y");

        var_dump(111);die;
        $save->save();
        $renter->save();
        $room->save();

    }

    //Danh Sách
    public function getList(){
        $rooms = rooms::where('id_mler', (Auth::user())->id_mler)->orderBy('status', 'asc')->get();
        $mtls = motels::where('id_mler', (Auth::user())->id_mler)->get();

        return view('moteler.rooms.list',['rooms'=>$rooms,'mtls'=>$mtls]);
    }

    //Xóa
    public function getDel($id){
        $rooms = rooms::find($id);
        $rooms->delete();

        return redirect('moteler/catalogue_room/list')->with('mess',' Bạn Đã Xóa Thành Công');
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
        $ctls = catalogue_room::where('id_mler',(Auth::user())->id_mler)->get();
        $mtls = motels::where('id_mler', (Auth::user())->id_mler)->get();

        $articles =DB::table('catalogue_room')
            ->join('motels', 'catalogue_room.id_mls', '=', 'motels.id')
            ->select('catalogue_room.id', 'catalogue_room.name')
            ->get();
        
        return view('moteler/rooms/add',['ctls'=>$ctls,'mtls'=>$mtls]);
    }
    public function postAdd(Request $res){
        $ctl = catalogue_room::find($res->id_ctl);
        
        $rooms = new rooms;
        $rooms->name = $res->name;
        $rooms->status = 0;
        $rooms->description = $res->des;
        $rooms->id_ctl = $res->id_ctl;
        $rooms->id_mls = $ctl->id_mls;
        $rooms->id_mler = (Auth::user())->id_mler;
//        $rooms->area = $res->area;

        $rooms->save();

        return redirect('moteler/rooms/add')->with('mess','Thêm Loại Phòng Thành công');
    }

    //change
    public function getChange($id){
        $room = rooms::find($id);
        $price = catalogue_room::where('id_mler',(Auth::user())->id_mler)
                                ->where('id', $room->id_ctl)->value('price');
        $allroom = rooms::where('id_mler', (Auth::user())->id_mler)->get();
        $price_rooms = catalogue_room::where('id_mler',(Auth::user())->id_mler)->get();

        return view('moteler/rooms/change',['room'=>$room, 'price'=>$price, 'rooms'=>$allroom, 'price_rooms'=>$price_rooms]);
    }

    public function postChange(Request $res, $id){

        var_dump('I am here');die;
        return true;
    }
}
