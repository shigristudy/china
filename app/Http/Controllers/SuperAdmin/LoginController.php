<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Super Admin Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating Super Admin for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $guard = 'superadmin';
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/superadmin/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:superadmin')->except('logout');
    }

    public function showLoginForm()
    {
        return view('superadmin.auth.login');
    }

    public function login(Request $request)
    {
        if (auth()->guard('superadmin')->attempt(['email' => $request->username, 'password' => $request->password])) {
            $superadmin = auth()->guard('superadmin')->user();

            return redirect()->route('superadmin.home');
        }
        return back()->withErrors(['username' => 'Invalid username or password']);
    }

    public function logout()
    {
        Auth::guard('superadmin')->logout();
        return redirect()->guest('superadmin/login');
    }

    public function username()
    {
        return 'username';
    }

}
