<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class statisticsCtrl extends Controller
{
    //
    public function showStatistics(){

        return view('moteler.Statistics.statistic');
    }
}
