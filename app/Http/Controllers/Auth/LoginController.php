<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use function GuzzleHttp\Psr7\_caseless_remove;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
use App\User;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm($id)
    {
        if($id) {
            Session::put('login_type', $id);
        }
        return view('web.pages.auth.login');
    }

    public function showLoginVerificationForm()
    {
        session(['login_status'], 'login');
        config(['site.page' => 'sign_in']);
        config(['site.wap_footer' => 'sign_in']);
        if(!session()->has('url.intended'))
        {
            session(['url.intended' => url()->previous()]);
        }
        if(is_Mobile()) {
            return view('wap.login_verify');
        } else {
            return view('web.login_verify');
        }
    }

    public function login(Request $request)
    {

        $login_type = Session::get('login_type');

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = auth()->user();
            switch ($login_type){
                case 'transcription':
                    return redirect()->route('transcription')->with('success', __('words.web.alert.login.success_text'));
                case 'translation':
                    return redirect()->route('translation')->with('success', __('words.web.alert.login.success_text'));
                case 'voiceover':
                    return redirect()->route('voiceover')->with('success', __('words.web.alert.login.success_text'));
                default:
                    return redirect()->route('home')->with('success', __('words.web.alert.login.success_text'));
            }
        }
        return back()->withErrors(['email' => __('words.web.alert.login.error_text')]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect(url('/'));
    }
}
