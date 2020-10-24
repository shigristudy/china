<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Traits\ValidationTrait;
use Hash;
use Auth;
use App\User;
use App\Admin;
use App\Models\Role;
use App\Models\AdminRole;

class UserController extends Controller
{

    use ValidationTrait;

    function admin_index(Request $request) {

        $mod_admin = new Admin();
        $admin_keyword =  '';

        if($request->admin_keyword != '') {
            $user_keyword = $request->admin_keyword;
            $mod_admin = $mod_admin->where(function($query) use($admin_keyword) {
                return $query->where('username', 'like', "%$admin_keyword%")
                    ->orWhere('email', 'like', "%$admin_keyword%")
                    ->orWhere('phone_number', 'like', "%$admin_keyword%")
                    ->orWhere('street', 'like', "%$admin_keyword%");
            });

        }

        $data_admin = $mod_admin->orderBy('created_at', 'desc')->paginate(10, ['*'], 'admin');
        $role = Role::with('admin_roles')->get();

        return view('superadmin.user.admin', compact('data_admin', 'admin_keyword', 'role'));
    }


    function admin_create(Request $request) {

    }


    function admin_edit(Request $request) {

    }

    function admin_delete($id) {

    }


    function customer_index(Request $request) {

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

    function customer_create(Request $request)
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


    function customer_edit(Request $request) {
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

    function customer_delete ($id) {
        User::destroy($id);
        return back()->with("success", 'Deleted Successfully!');
    }

    function role_index(Request $request) {

        $permission_keyword = '';
        $mod_permission = new Role();

        if($request->permission_keyword != '') {
            $mod_permission = $mod_permission->where(function ($query) use($permission_keyword) {
                return $query->where('title', 'like', "%$permission_keyword%")
                    ->orWhere('description', 'like', '%$permission_keyword%');
            });
        }
        $data_permission = $mod_permission->orderBy('created_at', 'desc')->paginate(5, ['*'], 'permission');

        return view('superadmin.user.role', compact('data_permission', 'permission_keyword'));
    }

    function role_create(Request $request) {
        $validator = $this->verify($request, 'superadmin.create_role');
        if($validator->fails()) {
            $messages = $validator->messages()->toArray();
            return responseWrong($messages);
        }

        $role = Role::create([
            'title'=> $request->get('title'),
            'description' => $request->get('description')
        ]);

        if(!$role) {
            return responseWrong('Some Error Occured');
        }

        return responseSuccess('Created Successfully!');
    }

    function role_delete($id) {
        Role::destroy($id);
        return back()->with('success','Deleted Successfully!');
    }
}
