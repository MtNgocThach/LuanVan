<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


use Illuminate\Support\Facades\Mail;
use App\PHPMailer;
use App\SMTP;

use App\moteler;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // $info = (Auth::user())->id_mler;

    function __construct()
    {
        $this->checkLogin();
        $this->info();
    }

    function checkLogin(){
        if(Auth::check()){
            
            view()->share('user_L',Auth::user());
        }
    }
    function info(){
        $user_n = moteler::all();
        view()->share('user_n',$user_n);
    }

    public function sendMail($data)
    {
        //goi thu vien
        @include('email\class.smtp.php');
        @include ('email\class.phpmailer.php');
        $result = [
            'code' => ''
        ];
        $pass = '';
        $acc = '';

//        if (Auth::)

        $nFrom              = $data['nfrom'];                       //mail duoc gui tu dau, thuong de ten cong ty ban
        $mFrom              = 'SCMsoftware01@gmail.com';            //dia chi email cua ban
        $mPass              = 'Thach123';                           //mat khau email cua ban
        $nTo                = 'Motel';                              //Ten nguoi nhan
        $mTo                = $data['email_to'];                    //dia chi nhan mail
        $mail               = new PHPMailer();
        $body               = $data['content'];                     // Noi dung email
        $title              = $data['title'];                       //Tieu de gui mail
        $mail->IsSMTP();
        $mail->CharSet      = "utf-8";
        $mail->SMTPDebug    = 0;                                    // enables SMTP debug information (for testing)
        $mail->SMTPAuth     = true;                                 // enable SMTP authentication
        $mail->SMTPSecure   = "ssl";                                // sets the prefix to the servier
        $mail->Host         = "smtp.gmail.com";                     // sever gui mail.
        $mail->Port         = 465;                                  // cong gui mail de nguyen
        // xong phan cau hinh bat dau phan gui mail
        $mail->Username     = $mFrom;                               // khai bao dia chi email
        $mail->Password     = $mPass;                               // khai bao mat khau
        $mail->SetFrom($mFrom, $nFrom);
        $mail->AddReplyTo($data['email_from']);                     //khi nguoi dung phan hoi se duoc gui den email nay
        $mail->Subject      = $title;                               // tieu de email
        $mail->MsgHTML($body);                                      // noi dung chinh cua mail se nam o day.
        $mail->AddAddress($mTo, $nTo);
        // thuc thi lenh gui mail
        // echo $res->blog;

        if(!$mail->Send()) {
            $result['code'] = '0';
        } else {
            $result['code'] = '1';
        }

        return $result;

    }
}
