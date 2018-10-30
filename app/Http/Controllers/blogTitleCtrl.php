<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\catalogue;
use App\catalogue_room;
use App\motels;
use App\moteler;

class blogTitleCtrl extends Controller
{
    //
    public function getInfo($id){

        $ctl = catalogue_room::where('id_ctlg',$id)->orderBy('view', 'desc')->get();
        // $ctl = $ctl_n::orderBy('view', 'desc')->get();
        return view('client.blog_title',['ctl'=>$ctl]);
    }
}
