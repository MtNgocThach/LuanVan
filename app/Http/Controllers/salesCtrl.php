<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class salesCtrl extends Controller
{
    //
    public function getList(){
//        $ctls = catalogue_room::all();
        return view('moteler.sales.list');
    }
}
