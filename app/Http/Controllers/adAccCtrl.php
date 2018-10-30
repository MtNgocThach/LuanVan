<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\account;
use App\moteler;
class adAccCtrl extends Controller
{
    //Danh sách
    public function getList(){
        $acc = account::where('prior','<>',1)->get();
        return view('admin.account.list',['accs'=>$acc]);
    }

    //Sửa
    public function getEdit($id){
        $accs = account::find($id);
        return view('admin.account.edit',['acc'=>$accs]);
    }
    public function postEdit(Request $res, $id){
        if($res->pass != $res->confirm_pass){
            return redirect('admin/account/edit/'.$id)->with('mess','Vui lòng nhập lại đúng mật khẩu');
        }
        else {
            $mler = moteler::find($res->id_mler);
            $acc = account::find($id);

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
