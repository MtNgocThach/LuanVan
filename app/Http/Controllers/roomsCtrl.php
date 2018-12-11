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
        $room->pay_deposit = $res->pay_deposit;
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
        $sers = services::where('id_mler', (Auth::user())->id_mler)
                        ->where('id_mls', $id)->get();
        $renter = renter::where('id_room', $id)->get();

        return view('moteler.rooms.payRoom',['room'=>$room, 'sers'=>$sers]);
    }

    public function postPayRoom(Request $res, $id){
        $sale= new sales;
        $room = rooms::find($id);
        $renter = renter::where('id_room', $id)->get();
        $room_cost = catalogue_room::where('id', $room->id_ctl)->value('price');
        $sers = services::where('id_mler', (Auth::user())->id_mler)
                        ->where('id_mls', $id)->get();

        $price_elec         = services::where('id_mls', $room->id_mls)
                                    ->where('id_mler', (Auth::user())->id_mler)
                                    ->where('name', 'Điện')->value('price');
        $price_water        = services::where('id_mls', $room->id_mls)
                                    ->where('id_mler', (Auth::user())->id_mler)
                                    ->where('name', 'Nước')->value('price');

        $cost_ser = 0;
        foreach ($sers as $ser){
            $price =$res->input('price_'.$ser->id);
            $cost_ser = $price;
        }

        $room->status       = 0;
        $room->debt         = 0;

        $renter->id_room    = 0;
        $renter->date_end   = date("Y/m/d");
        $renter->note       = $id;

        $sale->id_room      = $id;
        $sale->id_mler      = (Auth::user())->id_mler;
        $sale->id_mls       = $room->id_mls;
        $sale->room_cost    = $room_cost;
        $sale->no_elec_old  = $room->no_elec;
        $sale->no_elec_new  = $res->no_elec_new;
        $sale->no_water_old = $room->no_water;
        $sale->no_water_new = $res->no_water_new;
        $sale->price_elec   = $price_elec;
        $sale->price_water  = $price_water;
        $sale->debt         = $res->debt;
        $sale->sum          = $room_cost + ($sale->no_elec_new-$sale->no_elec_old)*$price_elec + $cost_ser +
                                ($sale->no_water_new-$sale->no_water_old)*$price_water + $sale->debt;
        $sale->status       = 4;
        $sale->date         = date("Y/m/d");
        $renter->date_pay   = date("Y/m/d");

        $sale->save();
        $renter->save();
        $room->save();

        return redirect('moteler/rooms/payRoom/'.$id)->with('mess',' Vui lòng thanh toán: '.$sale->sum);

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
        $rooms->no_elec = $res->no_elec;
        $rooms->no_water = $res->no_water;
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
        $allroom = rooms::where('id_mler', (Auth::user())->id_mler)
                                ->where('status', 0)->get();
        $price_rooms = catalogue_room::where('id_mler',(Auth::user())->id_mler)->get();

        $allroom = rooms::where('id_mler', (Auth::user())->id_mler)
            ->where('status', 0)->get();

        return view('moteler/rooms/change',['room'=>$room, 'price'=>$price, 'rooms'=>$allroom, 'price_rooms'=>$price_rooms]);
    }

    public function postChange(Request $res, $id){

        $rm = rooms::find($id);
        $room_change = rooms::find($res->id_room_change);
        $id_renter = renter::where('id_mler',(Auth::user())->id_mler)
                           ->where('id_room', $rm->id)->value('id');
        $services = services::where('id_mler', (Auth::user())->id_mler)->get();
        $renter = renter::find($id_renter);


        $renter->id_room = $id;
        $renter->date_start = date('Y/m/d');
        $renter->note = $renter->note . '- Đổi từ phòng ' . $rm->name . ' sang phòng ' . $room_change->name;

        $price_elec = '';
        $price_water = '';

        foreach ($services as $service) {
            if ($service->id_mls == $rm->id_mls && $service->name == 'Điện'){
                if (isset($service->price)){
                    $price_elec = $service->price;
                }
            }
            if ($service->id_mls == $rm->id_mls && $service->name == 'Nước'){
                if (isset($service->price)){
                    $price_water = $service->price;
                }
            }
        }
        $no_elec  = $res->no_elec_new - $res->no_elec_old;
        $no_water = $res->no_water_new - $res->no_water_old;

        $debt = $res->debt + $res->cost_date + ($no_elec*$price_elec) + ($no_water*$price_water);

        $room_change->status = 1;
        $room_change->debt = $debt;
        $room_change->deposit = $rm->deposit;
        $room_change->pay_deposit = $rm->pay_deposit;
        $room_change->date_change = date('Y/m/d');

        $rm->status = 0;
        $rm->debt = 0;
        $rm->deposit = 0;
        $rm->pay_deposit = 0;

        $renter->save();
        $rm->save();
        $room_change->save();

        return redirect('moteler/rooms/list')->with('mess','Đổi phòng thành công');

//        var_dump($room_change->date_change);die;
        return true;
    }
}
