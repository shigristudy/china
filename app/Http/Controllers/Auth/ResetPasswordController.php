<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ResetPasswordController extends Controller
{
    public function showFormResetPassword($token){

        $current_time = time();
        $expire_time = DB::table('users')
            ->where('remember_token', '=',  $token)
            ->get('expire_time')[0]->expire_time;
        Session::put('token', $token);
        if($current_time <= $expire_time){
            return view('web.pages.auth.reset_password');
        }
        else{
            return view('web.pages.auth.expiration')->withErrors( __('words.web.forgot_pwd.expire'));
        }
    }
    public function updatePassword(Request $request){

        $request->validate([
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|string|min:8',
        ]);
        $token = Session::get('token');
        $password = $request->get('password');
        $confirm_password = $request->get('confirm_password');
        if($password == $confirm_password){
            $data = [
                'password' => Hash::make($password)
            ];
            DB::table('users')->where('remember_token', '=',  $token)
                ->update($data);
            return redirect(route('login'))->with('success', 'Your password has been changed!');
        }
        else{
            return back()->withErrors('Confirm password does not match!');
        }
    }
}
