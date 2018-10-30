<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\catalogue;
use App\catalogue_room;
use App\motels;

class trangchuCtrl extends Controller
{
    //
    public function getInfo(){
        $mxprice = catalogue_room::max('price');
        $ctls = catalogue::all();
        $cr = catalogue_room::all();
        $mtl = motels::all();
        // echo ($cr);
        return view('client.trangchu',['ctls'=>$ctls,'mtls'=>$mtl]);
    }

    public function postInfo(Request $res){

        $ctls = catalogue::all();

        $mxprice = catalogue_room::max('price');
        $mnprice = catalogue_room::min('price');
        $mtl = motels::all();
        
        if(isset($res->price)){

            // echo $mnprice;
            return view('client.trangchu',['ctls'=>$ctls,'mtls'=>$mtl,'mnprice'=>$mnprice  ]);
        }
        if(isset($res->numoers)){

            $ctl_num = DB::table('catalogue_room')
            ->join('motels', 'catalogue_room.id_mls', '=', 'motels.id')
            ->select('users.*', 'catalogue_room.numpers')
            ->get();
            echo $ctl_num;
            // return view('client.trangchu',['ctls'=>$ctls,'mtls'=>$mtl,'mnprice'=>$mnprice  ]);
        }
        $ctl_num = DB::table('catalogue_room')
        ->join('motels', 'catalogue_room.id_mls', '=', 'motels.id')
        ->select('motels.*', 'catalogue_room.numpers')
        ->get();
        // echo $ctl_num;
        return view('client.trangchu',['ctls'=>$ctls,'mtls'=>$ctl_num]);
    }
}
