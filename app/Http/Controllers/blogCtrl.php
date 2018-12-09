<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\motels;
use App\moteler;
use App\catalogue_room;
use App\catalogue;  

class blogCtrl extends Controller
{
    //
    public function getInfo(){
        
        $ctl = catalogue::all();
        $cr = catalogue_room::orderBy('view', 'desc')->get();

        return view('client.blog',['ctl'=>$ctl,'crs'=>$cr]);
    }

    public function postInfo(){
        
    }
}
