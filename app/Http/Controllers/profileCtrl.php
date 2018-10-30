<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\motels;
use App\moteler;
use App\account;

class profileCtrl extends Controller
{
    //Thông Tin
    public function getInfo(){ 
        $user = Auth::user()->id_mler;

        $mler = moteler::find((Auth::user()->id_mler));
        $acc = account::find($user);
        // echo $acc;
        return view('moteler.profile.info',['mler'=>$mler,'acc'=>$acc]);
    }

    //Sửa
    public function getEdit($id){
        $user = Auth::user()->id_mler;

        $mler = moteler::find($id);
        $acc = account::find($user);
        return view('moteler.profile.edit',['mler'=>$mler,'acc'=>$acc]);
    }

    //Thêm
    public function postEdit(Request $res, $id){
        if($res->pass != $res->confirm_pass){
            return redirect('moteler/profile/edit/'.$id)->with('mess','Vui lòng nhập lại đúng mật khẩu');
        }
        else {
            $mler = moteler::find($id); 
            $acc = account::find($res->id_acc);

            $mler->last_name = $res->last_name;
            $mler->frist_name = $res->frist_name;
            $mler->address = $res->address;
            $mler->phone = $res->phone;
            $mler->email = $res->email;

            
            $acc->username = $res->user;
            $acc->password = bcrypt($res->pass);
            
            $mler->save();
            $acc->save();
            // echo ($acc->password);
            return redirect('moteler/profile/edit/'.$id)->with('mess','Cập nhật thông tin thành công');
        }
    }
}
