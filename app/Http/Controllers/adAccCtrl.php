<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\motels;
use App\account;
use App\moteler;

use App\Http\Controllers\mailCtrl;

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

    public function getAdd(){

        return view('admin/account/add');
    }

    public function postAdd(Request $res){
        $acc     = new account();
        $moteler = new moteler();

        if($res->pass != $res->confirm_pass){
            return redirect('admin/account/add')->with('mess','Vui lòng xác nhận mật khẩu chính xác');
        }else{
            $acc->username = $res->user;
            $acc->password = bcrypt($res->pass);

            $acc->save();

            $idAcc = account::where('username',$res->user)->value('id');

            $moteler->frist_name = $res->frist_name;
            $moteler->last_name  = $res->last_name;
            $moteler->phone      = $res->phone;
            $moteler->email      = $res->email;
            $moteler->address    = $res->address;
            $moteler->id_acc     = $idAcc;

            $moteler->save();

            $acc_new = account::find($idAcc);
            $id_mler = moteler::where('id_acc', $idAcc)->value('id');
            $acc_new->id_mler = $id_mler;

            $acc_new->save();

            $data = [
                'nFrom'         => 'Website hệ thống quản lý nhà trọ',
                'email_from'    => '',
                'email_to'      => $moteler->email,
                'title'         => 'Hệ thống nhà trọ: Tài khoản của bạn',
                'content'       => 'Website Hệ thống quản lý nhà trọ xin gửi tới chủ nhà trọ '.$moteler->last_name.$moteler->frist_name.
                                    ' tài khoản và mật khẩu của bạn để đnăg nhập và sử dụng hệ thống. Tài khoản :'.$acc->username.' 
                                    , mật khẩu: $acc->password. Để đảm bảo an toàn thông tin, xin quý khách thay đổi mạt khẩu được cung cấp.'

            ];

            $this->sendMail($data);

            return redirect('admin/account/add')->with('mess','Thêm Tài Khoản Mới Thành công');


        }
    }

    public function getListMotels(){
        $mtls = motels::all();

        return view('admin/account/listMotels',['mtls'=>$mtls]);
    }

    public function getEditMotel($id){
        $mtl = motels::find($id);

        return view('admin/account/editMotel',['mtl'=>$mtl]);
    }

    public function postEditMotel(Request $res, $id){

        $mtl = motels::find($id);

        $mtl->longitude = $res->longitude;
        $mtl->latitude = $res->latitude;

        $mtl->save();

        return redirect('admin/account/listMotels')->with('mess','Cập nhật thành công vị trí');
    }
}
