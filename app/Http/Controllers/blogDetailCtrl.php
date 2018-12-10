<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\catalogue_room;
use App\moteler;
use App\services;
use Illuminate\Support\Facades\Auth;

class blogDetailCtrl extends Controller
{
    //
    public function getInfo($id){

        $ctls = catalogue_room::find($id);
        $mler = moteler::where('id',$ctls->motels->id_mler)->get()->first();
        $sers = services::where('id_mler', $ctls->motels->id_mler)->where('id_mls',$ctls->motels->id)->get();

        $ctls->view = $ctls->view  + 1 ;

        $ctls->save();
        // echo $ctls;
        // echo $mler;
        return view('client.blog_detail',['ctl'=>$ctls,'mler'=>$mler,'sers'=>$sers]);
    }
}
