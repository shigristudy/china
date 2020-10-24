<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ForgotPasswordUserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Exception;
use Mail;

class ForgotPasswordController extends Controller
{

    public function showForgotPasswordForm() {

        return view('web.pages.auth.forgot_password');

    }

    public function postEmail(Request $request) {

        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $user_email = $request->email;
        $token = Str::random(60); $expire_time = time() + 300;

        $data = [
            'remember_token' => $token,
            'expire_time' => $expire_time,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];
        DB::table('users')->where('email', '=',  $user_email)->update($data);

        $admin_name=config('mail.from.name');
        $admin_email=config('mail.from.address');

        $mailData = [
            'name' => $admin_name,
            'email' => $admin_email,
            'token' => $token
        ];

        try {
            //send to User
            $user_data=new ForgotPasswordUserMail($mailData);
            Mail::to($user_email)->send($user_data);

            return view('web.pages.auth.forgot_success', compact('user_email'))->with('success','Successfully!');
        }
        catch (Exception $e) {
            return response()->json(0);
        }

    }
}
