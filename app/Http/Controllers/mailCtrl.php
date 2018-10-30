<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\PHPMailer;
use App\SMTP;


class mailCtrl extends Controller
{
    //
    public function sendEmail(Request $res)
    {
        //goi thu vien
    @include('email\class.smtp.php');
    @include ('email\class.phpmailer.php'); 

    $nFrom = $res->name;                        //mail duoc gui tu dau, thuong de ten cong ty ban
    $mFrom = 'SCMsoftware01@gmail.com';         //dia chi email cua ban 
    $mPass = 'Thach123';                        //mat khau email cua ban
    $nTo = 'Motel';                             //Ten nguoi nhan
    $mTo = $res->toemail;                       //dia chi nhan mail
    $mail             = new PHPMailer();
    $body             = $res->content;          // Noi dung email
    $title = 'Phòng trọ';                       //Tieu de gui mail
    $mail->IsSMTP();             
    $mail->CharSet  = "utf-8";
    $mail->SMTPDebug  = 0;                      // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;                   // enable SMTP authentication
    $mail->SMTPSecure = "ssl";                  // sets the prefix to the servier
    $mail->Host       = "smtp.gmail.com";       // sever gui mail.
    $mail->Port       = 465;                    // cong gui mail de nguyen
    // xong phan cau hinh bat dau phan gui mail
    $mail->Username   = $mFrom;                 // khai bao dia chi email
    $mail->Password   = $mPass;                 // khai bao mat khau
    $mail->SetFrom($mFrom, $nFrom);
    $mail->AddReplyTo($res->email);             //khi nguoi dung phan hoi se duoc gui den email nay
    $mail->Subject    = $res->subject;          // tieu de email 
    $mail->MsgHTML($body);                      // noi dung chinh cua mail se nam o day.
    $mail->AddAddress($mTo, $nTo);
    // thuc thi lenh gui mail 
    // echo $res->blog;
    if(!$mail->Send()) {
        // if(isset($res->res)){
        //     return redirect('client/blog_detail/'.'$res->blog')->with('mess_danger','Vui lòng kiểm tra lại thông tin');
        // }
        return redirect('client/contact')->with('mess_danger','Vui lòng kiểm tra lại thông tin');
         
    } else {
        // if(isset($res->res)){
        //     return redirect('client/blog_detail/{{ $res->blog }}')->with('mess_danger','Gửi Mail thành công');
        // }
         
        return redirect('client/contact')->with('mess_sus','Gửi Mail thành công');
    }
    }
}
