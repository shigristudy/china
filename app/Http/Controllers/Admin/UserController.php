<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Traits\ValidationTrait;

use App\User;

use Auth;
use Hash;

class UserController extends Controller
{

    use ValidationTrait;

    function index(Request $request) {

        $mod_user = new User();
        $user_keyword =  '';

        if($request->user_keyword != '') {
            $user_keyword = $request->user_keyword;
            $mod_user = $mod_user->where(function($query) use($user_keyword) {
                return $query->where('username', 'like', "%$user_keyword%")
                    ->orWhere('email', 'like', "%$user_keyword%")
                    ->orWhere('phone_number', 'like', "%$user_keyword%")
                    ->orWhere('street', 'like', "%$user_keyword%");
            });

        }

        $data_user = $mod_user->orderBy('created_at', 'desc')->paginate(10, ['*'], 'user');

        return view('admin.user.index', compact('data_user', 'user_keyword'));
    }

    function create_user(Request $request)
    {

        $validator = $this->verify($request, 'admin.create_user');
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();

            return responseWrong($messages);
        }

        $user = User::create([
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'company' => $request->get('company'),
            'phone_number' => $request->get('phone_number'),
            'street' => $request->get('street'),
            'house_number' => $request->get('house_number'),
            'zip_code' => $request->get('zip_code'),
            'city' => $request->get('city'),
            'federal_state' => $request->get('federal_state'),
            'country' => $request->get('country'),
            'tax_id' => $request->get('tax_id'),
            'password' => Hash::make($request->get('password'))
        ]);

        if(!$user) {
            return responseWrong('Some error occured');
        }

        return responseSuccess('Created Successfully!');
    }


    function edit_user(Request $request) {
        $validator = $this->verify($request, 'admin.edit_user');
        if($validator->fails()) {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $data = [
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'company' => $request->get('company'),
            'phone_number' => $request->get('phone_number'),
            'street' => $request->get('street'),
            'house_number' => $request->get('house_number'),
            'zip_code' => $request->get('zip_code'),
            'city' => $request->get('city'),
            'federal_state' => $request->get('federal_state'),
            'country' => $request->get('country'),
            'tax_id' => $request->get('tax_id'),
        ];

        if($request->get('password') != '') {
            $data['password'] = Hash::make($request->get('password'));
        }
        $user = new User();
        $user = $user->where('id', $request->get('id'))->update($data);
        if(!$user) {
            return responseWrong('Some error occured');
        }

        return responseSuccess('Updated Successfully!');
    }

    function delete_user ($id) {
        User::destroy($id);
        return back()->with("success", 'Deleted Successfully!');
    }

}
