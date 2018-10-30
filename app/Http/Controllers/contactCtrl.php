<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

use App\account;
use App\moteler;

class contactCtrl extends Controller
{
    //
    public function getInfo(){
        $cont = account::find(2);
        $mtler = moteler::find(2);
        return view('client.contact',['cont'=>$cont],['mler'=>$mtler]);
    }
}
