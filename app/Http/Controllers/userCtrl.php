<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userCtrl extends Controller
{
    
    //
    public function getLoginMotelers(){
        return view('login');
    }
    public function postLoginMotelers(Request $res){
        $data=[
    		'username'=>$res->user,
    		'password'=>$res->pass,
    	];
    	if(Auth::attempt($data)){
            Auth::login(Auth::user(), true);
            if(Auth::check()){
                $user = Auth::user();
                if($user->prior == 2){
                    return redirect('moteler/motels/list');
                }
                    return redirect('admin/account/list');
                
            }
            // $user = Auth::user();
            echo 'f';
            // echo $user;
        }else{
    		return redirect('login')->with('mess','Đăng nhập thất bại,vui lòng kiểm tra lại');
    	}
        
        
    }

    public function getLogout(){
        Auth::logout();
        return redirect('login');
    }
}
