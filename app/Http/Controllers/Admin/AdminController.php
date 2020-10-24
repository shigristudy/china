<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Admin;
use Hash;
use Validator;
use Auth;

class AdminController extends Controller
{
    /**
     *
     * Show the Admin dashboard
     */

    public function index() {

        return view('admin.home');
    }

    public function change_password(Request $request) {

        $request->validate([
            'old_password' =>'required',
            'password' => 'required|string|min:6|confirmed'
        ]);
        $data = $request->all();

        $admin = Auth::guard('admin')->user();

        if(!Hash::check($data['old_password'], $admin->password)) {

            return back()->withErrors(['old_password' => 'Current Password does not match.']);
        }

        $admin->password = Hash::make($data['password']);

        $admin->save();

        return back()->with('success', 'Updated Successfully');


    }
}
