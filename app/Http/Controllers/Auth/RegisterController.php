<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\RegisterAdminMail;
use App\Mail\RegisterUserMail;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Traits\ValidationTrait;
use App\User;
use Exception;
use Mail;

class RegisterController extends Controller
{
    /*
   |--------------------------------------------------------------------------
   | Register Controller
   |--------------------------------------------------------------------------
   |
   | This controller handles the registration of new users as well as their
   | validation and creation. By default this controller uses a trait to
   | provide this functionality without requiring any additional code.
   |
   */

    use ValidationTrait;

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegisterForm(){

        return view('web.pages.auth.register');

    }

    public function register(Request $request){

        $validator = $this->verify($request, 'web.create_customer');
        if ($validator->fails()) {
            $messages = $validator->messages()->toArray();
            return back()->withErrors($messages);
        }

        function generatePIN($digits = 5){
            $i = 0; //counter
            $pin = ""; //our default pin is blank.
            while($i < $digits){
                //generate a random number between 0 and 9.
                $pin .= mt_rand(0, 9);
                $i++;
            }
            return $pin;
        }
        $pin = generatePIN();

        $user = User::create([
            'user_id' => $pin,
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'company' => $request->get('company'),
        ]);

        if(!$user) {
            return responseWrong('Some error occured');
        }

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = auth()->user();

            //E-mail sending when register
            $email_policy = $request->get('terms-condition');
            if($email_policy == 'terms-condition'){

                $admin_name=config('mail.from.name');
                $admin_email=config('mail.from.address');
                $first_name = $request->get('first_name');
                $last_name = $request->get('last_name');
                $user_email = $request->get('email');

                $admin_data = [
                    'name' => $admin_name,
                    'admin_email' => $admin_email,
                ];
                $user_data = [
                    'name' => $admin_name,
                    'admin_email' => $admin_email,
                    'first_name' => $first_name,
                    'last_name' => $last_name,
                    'user_email' => $user_email
                ];

                try {
                    // send to admin
                    $admin_data=new RegisterAdminMail($admin_data);
                    Mail::to($admin_email)->send($admin_data);
                    //send to User
                    $user_data=new RegisterUserMail($user_data);
                    Mail::to($user_email)->send($user_data);
                }
                catch (Exception $e) {
                    return response()->json(0);

                }
            }
            return redirect(route('home'))->with('success', __('words.web.alert.register.success_text'));
        }
        return true;
    }


    public function update(Request $request) {
        $validator = $this->verify($request, 'web.update_customer');
        if($validator->fails()) {
            $messages = $validator->messages()->toArray();
            return back()->withErrors($messages);
        }

        $data = [
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
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
        $login_user = Auth::user();
        $user = $user->where('id', $login_user->id)->update($data);
        if(!$user) {
            return back()->withErrors(__('words.web.alert.register.update_error'));
        }

        return back()->with('success', __('words.web.alert.register.update_success'));
    }
}
