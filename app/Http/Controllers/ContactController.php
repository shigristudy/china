<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactAdminMail;
use App\Mail\ContactUserMail;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;
use Exception;
use Mail;
use Validator;
class ContactController extends Controller
{
    public function send_email(Request $req){
        $validate = $this->validate($req, [
            'g-recaptcha-response' => 'required|recaptchav3:register,0.5'
        ]);

        $admin_email=config('mail.from.address');
        $admin_name=config('mail.from.name');

        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'message' => $req->message,
            'admin_email' => $admin_email,
        ];

        $to_user= [
            'name' => $admin_name,
            'email' => $admin_email,
        ];

        try {
            // send to admin
            $admin_mail=new ContactAdminMail($data);
            Mail::to($admin_email)->send($admin_mail);
            //send to client
            $user_mail=new ContactUserMail($to_user);
            Mail::to($req->email)->send($user_mail);
            return response()->json(1);
        } catch (Exception $e) {
            return response()->json(0);

        }
    }
}
