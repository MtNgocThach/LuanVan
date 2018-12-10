<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\rooms;
use App\motels;

class statisticsCtrl extends Controller
{
    //
    public function showStatistics(){

        $room_0 = rooms::where('id_mler', (Auth::user())->id_mler)->where('status', 0)->get()->count();
        $room_1 = rooms::where('id_mler', (Auth::user())->id_mler)->where('status', 1)->get()->count();
        $allroom = rooms::where('id_mler', (Auth::user())->id_mler)->get()->count();



//        var_dump($room_0);die;

        return view('moteler.Statistics.statistic', ['room_0'=>$room_0, 'room_1'=>$room_1,'allroom'=>$allroom]);
    }
}
